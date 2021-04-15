import "bootstrap/dist/css/bootstrap.css";
import "bootstrap";
import "popper.js";
import "perfect-scrollbar";

import "@coreui/coreui";
import "@coreui/coreui/dist/css/coreui.css";

import "primevue/resources/themes/saga-blue/theme.css"; // theme
import "primevue/resources/primevue.min.css"; // core css
import "primeicons/primeicons.css";

import "../../static/css/crosier.css";

import Cleave from "cleave.js";
import "cleave.js/dist/addons/cleave-phone.br.js";

document.addEventListener("DOMContentLoaded", function onDOMContentLoaded() {
  document.querySelectorAll(".crsr-date").forEach(function format(el) {
    console.log(el);
    // eslint-disable-next-line no-new
    new Cleave(el, {
      date: true,
      delimiter: "/",
      datePattern: ["d", "m", "Y"],
    });
  });

  document.querySelectorAll(".telefone").forEach(function format(el) {
    // eslint-disable-next-line no-new
    new Cleave(el, {
      phone: true,
      phoneRegionCode: "BR",
      blocks: [0, 3, 3, 4],
      delimiters: ["(", ") ", "-"],
    });
  });

  // eslint-disable-next-line no-new
});
