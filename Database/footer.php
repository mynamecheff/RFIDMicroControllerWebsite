<!--
this is a footer (the buttom navigation bar)
for all the main pages, so it is easier to
modifiy it and nicer to look at.
Created by Ahmed
 -->
<style>
  .icon {
    text-decoration: none;
    background-repeat: no-repeat; /* don't repeat the icons */
    padding-left: 7%;
    position: relative;
  }
  .icon::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  width: 100%;
  height: 2px;
  background: currentColor;
  -webkit-transform: scaleX(0);
          transform: scaleX(0);
  -webkit-transform-origin: right;
          transform-origin: right;
  transition: -webkit-transform 250ms ease-in;
  transition: transform 250ms ease-in;
  transition: transform 250ms ease-in, -webkit-transform 250ms ease-in;
}
.icon--facebook-white::after,.icon--phone-white::after {
  left: 25%;
  width: 77%;
}
.icon--twitter-white::after {
  left: 35%;
  width: 70%;
}
.icon--email-white::after {
  left: 15%;
  width: 87%;
}
.icon:hover::after {
  -webkit-transform: scaleX(1);
          transform: scaleX(1);
  -webkit-transform-origin: left;
          transform-origin: left;
}
  .icon--phone-white { /* phone icon */
      background-image: url(https://styleguide.fdm.dk/images/icons/footer/telephone.svg);
  }
  .icon--email-white { /* mail icon */
      background-image: url(https://styleguide.fdm.dk/images/icons/footer/mail.svg);
  }
  .icon--twitter-white { /* twitter icon */
    background-image: url(https://styleguide.fdm.dk/images/icons/footer/twitter.svg);
  }
  .icon--facebook-white { /* facebook icon */
    background-image: url(https://styleguide.fdm.dk/images/icons/footer/facebook.svg);
  }
  .icon--cookie-white {
    padding: 0;
    /* background-image: url('cookie-svgrepo-com.svg'); */
  }

  .footer a, .footer a:active, .footer a:hover, .footer a:visited {
      color: #f2f2f2;
  }
  footer {
    margin-top: auto;
    font-family: mada,Helvetice Neue,arial,sans-serif;
    color: #fff;
    background-color: #3ba9dc;
  }
  .footer {
    padding-top: 2%;
    display: flex;
  }
  .clo {
      flex: 1;
  }
  h6 {
    font-size: 1.3rem;
  }
  .footer-list-1,.footer-list-2 {
    border-right: white solid 2px;
  }
  ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }
</style>
<footer class = ""> <!-- footer section -->
  <div class="footer"> <!-- container of the footer items -->
    <div class = "clo"> <!-- columns container -->
      <h6 class="contactInfo">Privacy Policy</h6>
      <ul class="footer-list-1">
        <li class="mb-2"><a href="#" class="icon icon--cookie-white">Cookies</a></li>
        <li class="mb-2"><a href="#" class="icon icon--cookie-white">Copyright© 2022</a></li>
      </ul>
    </div>
    <div class = "clo">
      <h6 class="contactInfo">Follow Us</h6>
      <ul class="footer-list-2">
        <li class="mb-2"><a href="#" class="icon icon--twitter-white">Twitter</a></li>
        <li class="mb-2"><a href="#" class="icon icon--facebook-white">Facebook</a></li>
      </ul>
    </div>
    <div class = "clo">
      <h6 class="contactInfo">Contact Us</h6>
      <ul class="footer-list-3">
        <li class="mb-2"><a href="tel:+12345678" class="icon icon--phone-white">12 34 56 78</a></li>
        <li class="mb-2"><a href="#" class="icon icon--email-white">Keyvio@keyvio.com</a></li>
      </ul>
    </div>
  </div>
</footer>
