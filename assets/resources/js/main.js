import jQuery from "jquery";
import Swiper from "swiper";

(function(document, window, jQuery, Swiper) {
  const routes = require("./routes");

  window.$ = window.jQuery = jQuery;
  window.Swiper = Swiper;

  require("./components/navbar");

  if (routes.checkRoute("home-page")) {
    require("./components/show-credentials-items");
    require("./components/swiper-folk");
    require("./components/change-language");
  }

  if (routes.checkRoute("qualquer-page")) {
    require("./components/example.vanilla");
  }
})(document, window, jQuery, Swiper);
