import "bootstrap";
import "popper.js";
import "perfect-scrollbar";
import "@coreui/coreui";

import "../../static/css/crosier.css";
import "../../static/css/primevue.css";
import "bootstrap/dist/css/bootstrap.css";
import "@coreui/coreui/dist/css/coreui.css";

import "primevue/resources/themes/saga-blue/theme.css"; // theme
import "primevue/resources/primevue.min.css"; // core css
import "primeicons/primeicons.css";

import Cleave from "cleave.js";
import "cleave.js/dist/addons/cleave-phone.br.js";

document.addEventListener("DOMContentLoaded", function onDOMContentLoaded() {
  document.querySelectorAll(".crsr-date").forEach(function format(el) {
    // eslint-disable-next-line no-new
    new Cleave(el, {
      date: true,
      delimiter: "/",
      datePattern: ["d", "m", "Y"],
    });
  });

  document.querySelectorAll(".crsr-datetime").forEach(function format(el) {
    el.maxLength = 19; // 01/02/1903 12:34:56
    // eslint-disable-next-line no-new
    new Cleave(el, {
      numeralPositiveOnly: true,
      delimiters: ["/", "/", " ", ":"],
      blocks: [2, 2, 4, 2, 2, 2],
    });
  });

  document.querySelectorAll(".crsr-datetime-nseg").forEach(function format(el) {
    el.maxLength = 17; // 01/02/1903 12:34
    // eslint-disable-next-line no-new
    new Cleave(el, {
      numeralPositiveOnly: true,
      delimiters: ["/", "/", " ", ":"],
      blocks: [2, 2, 4, 2, 2],
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
