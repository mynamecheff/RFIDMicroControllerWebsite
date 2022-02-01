/*
    Scans the key ID in hex value and grants access weather the Id is valid or not
    Program utilises the Servo motor opening the lock.
    Communicates with website and database

*/
//Imports Libraries
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>
#include <SPI.h>
#include <MFRC522.h>
#include <Servo.h>

HTTPClient http; //httpclient
WiFiClient wificlient; //wificlient
Servo servo; //defines servo motor
#define ON_Board_LED 2

//Pin location for keylock pins
int SS_PIN = D2;
int RST_PIN = D1;

MFRC522 mfrc522(SS_PIN, RST_PIN);   // MFRC setup

/*Add your own network information*/
const char* ssid = "Telia-9FC6B7"; //Your SSID
const char* password = "0C0DAE6AF3"; //Your network password
const char *host = "http://2882-80-63-18-26.ngrok.io";  //Server IP
String serverIP = "http://2882-80-63-18-26.ngrok.io"; //Server IP
const uint16_t port = 80; //PORT

ESP8266WebServer server(80); //defines the use of port 80
//--------------------------------------------------------------------
String hexa = "";


//Written by: Albert
void setup() {

  servo.attach(0);  //Servo Pin Number (pin 0 is the same as D3)
  servo.write(0);
  delay(4000);
  servo.write(180);
  Serial.begin(115200);   // Serial bandwidth
  SPI.begin();      // Starts SPI which is needed to communicate
  mfrc522.PCD_Init();   // Starts MFRC
  delay(500);
  pinMode(ON_Board_LED, OUTPUT);
  digitalWrite(ON_Board_LED, HIGH);
  //network part
  //-----------------------------------------------------------------
  WiFi.begin(ssid, password);
  Serial.println();
  Serial.print("Trying to connect ");
  while (WiFi.status() != WL_CONNECTED) {
    //LED will flash when tring to connect to wifi
    digitalWrite(ON_Board_LED, LOW);
    delay(300);
    digitalWrite(ON_Board_LED, HIGH);
    delay(300);
    Serial.print(".");
  }
  WiFi.mode(WIFI_STA); //This line hides the viewing of ESP as wifi hotspot
  digitalWrite(ON_Board_LED, HIGH);
  Serial.println();
  Serial.print("Connected to: ");
  Serial.println(ssid);
  Serial.print("Ip addess: ");
  Serial.println(WiFi.localIP());
  //---------------------------------------------------------------------
  Serial.print("Debug: "); //for serial testing
}


//Written by: Albert
void loop() {
  delay(2000);

  if (buttonOpenLock() == 1) { //door is open via button
    servo.write(180);
    delay(5000);
  } else {
    //door is closed via button
    if (keycard() == 1) { //when door is open via RFID chip
      Serial.println("door is open");
      servo.write(180);
      delay(10000);
      servo.write(0);
    } else { //door closed :((
      Serial.println("door is locked");
      servo.write(0);
    }
  }

}

//Method connecting the ESP to our database via php code. Will lock/open the door if button is pressed
//Written by: Nicklas
int buttonOpenLock() {
  Serial.println("\nbuttonOpenLock start");

  String fullURL = "";
  fullURL = serverIP + "/NodeMCU_RC522_Mysql/door_request.php";
  http.begin(wificlient, fullURL); //Requset location

  int httpCode = http.GET(); //Post msg
  String response = http.getString(); // response msg
  Serial.print("");

  Serial.print("Corresponding http code (should be 200): ");
  Serial.println(httpCode); //Corresponding http code
  Serial.print("response: ");
  Serial.println(response);
  http.end();

  if (strcmp(response.c_str(), "unlocked") == 0) {
    return 1;
  }
  if (strcmp(response.c_str(), "locked") == 0) {
    return 0;
  }

  return 0;
}

//Method to send a POST request to server. Server will return "Accepted" if the key id is known
//written by: Nicklas
int keycard() {
  //calls userid method which scans keycard
  int avail = userid();
  hexa.toUpperCase();

  if (avail) {  //sends a request to server to check the credentials
    digitalWrite(ON_Board_LED, LOW);

    //Network part
    //-------------------------------------------------------------------
    String postData;
    postData = "UIDresult=" + hexa; //same name is the .php container

    String url = serverIP + "/NodeMCU_RC522_Mysql/getUID.php";
    http.begin(wificlient, url); //Requset location replace this with your url
    http.addHeader("Content-Type", "application/x-www-form-urlencoded"); //define header


    int httpCode = http.POST(postData); //Post msg
    String payload = http.getString(); // response msg
    Serial.print("");

    Serial.print("\nSent msg");
    Serial.println(hexa);
    Serial.print("Corresponding http code (should be 200): ");
    Serial.println(httpCode); //Corresponding http code
    Serial.print("Payload: ");
    Serial.println(payload);  //payload


    http.end();
    //-----------------------------------------------------------------
    digitalWrite(ON_Board_LED, HIGH); //signify connection
    delay(1000);

    //if key id is known to the database
    if (strcmp(payload.c_str(),"Accepted")==0) {
      return 1;
      //if key id is NOT known to the database
    } else {
      return -1;
    }

  }
  return -1;
}

//method to return the id of chip in HEX value
//written by: Umar
int userid() {
  hexa = "";
  if (!mfrc522.PICC_IsNewCardPresent()) //MFRC library checks if a key is present
  {
    return 0;
  }
  if (!mfrc522.PICC_ReadCardSerial()) //MFRC library reads card serial
  {
    return 0;
  }
  Serial.print("\nKey hex id:");

  //code below writes key's id in hex
  for (byte i = 0; i < mfrc522.uid.size; i++) {
    Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : "");  // first print data to USB serial port
    Serial.print(mfrc522.uid.uidByte[i],HEX);                 // number to print is only one digit prepend blank AND 0 otherwis only blank
                                                              // print the number in hexadecimal notation
                                                              // then do the same for a String <content> variable adding (concatenating) one number at a time
    hexa.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : ""));
    hexa.concat(String(mfrc522.uid.uidByte[i], HEX));
  }
  return 1;
}
