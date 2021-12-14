import "bootstrap";
import "bootstrap/dist/css/bootstrap.css";
import "popper.js";

import "@coreui/coreui";
import "@coreui/coreui/dist/css/coreui.css";

import "@coreui/utils/dist/coreui-utils";
import "@coreui/utils/dist/coreui-utils.common";

import Sidebar from "@coreui/coreui/js/src/sidebar";

import "../../styles/primevue.css";

import "primevue/resources/themes/saga-blue/theme.css"; // theme
import "primevue/resources/primevue.min.css"; // core css
import "primeicons/primeicons.css";

import Cleave from "cleave.js";
import "cleave.js/dist/addons/cleave-phone.br.js";

import "../../styles/crosier.css";
import "../../styles/_layout.scss";

import "simplebar/dist/simplebar";
import "simplebar/dist/simplebar.css";
import Push from "push.js";
import axios from "axios";

document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".crsr-date").forEach(function format(el) {
    // eslint-disable-next-line no-new
    new Cleave(el, {
      date: true,
      delimiter: "/",
      datePattern: ["d", "m", "Y"],
    });
  });

  document.querySelectorAll(".crsr-datetime").forEach((el) => {
    el.maxLength = 19; // 01/02/1903 12:34:56
    // eslint-disable-next-line no-new
    new Cleave(el, {
      numeralPositiveOnly: true,
      delimiters: ["/", "/", " ", ":"],
      blocks: [2, 2, 4, 2, 2, 2],
    });
  });

  document.querySelectorAll(".crsr-datetime-nseg").forEach((el) => {
    el.maxLength = 17; // 01/02/1903 12:34
    // eslint-disable-next-line no-new
    new Cleave(el, {
      numeralPositiveOnly: true,
      delimiters: ["/", "/", " ", ":"],
      blocks: [2, 2, 4, 2, 2],
    });
  });

  document.querySelectorAll(".crsr-date-periodo").forEach((el) => {
    el.maxLength = 23; // 01/02/1903 12:34:56
    // eslint-disable-next-line no-new
    new Cleave(el, {
      numeralPositiveOnly: true,
      delimiters: ["/", "/", " - ", "/", "/"],
      blocks: [2, 2, 4, 2, 2, 4],
    });
  });

  document.querySelectorAll(".telefone").forEach((el) => {
    // eslint-disable-next-line no-new
    new Cleave(el, {
      phone: true,
      phoneRegionCode: "BR",
      blocks: [0, 3, 3, 4],
      delimiters: ["(", ") ", "-"],
    });
  });

  document.querySelectorAll(".cnpj").forEach((el) => {
    if (el instanceof HTMLInputElement) {
      // eslint-disable-next-line no-new
      new Cleave(el, {
        delimiters: [".", ".", "/", "-"],
        blocks: [2, 3, 3, 4, 2],
        numericOnly: true,
        delimiterLazyShow: true,
      });
    } else {
      el.innerHTML = el.innerHTML.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/g, "$1.$2.$3/$4-$5");
    }
  });

  document.querySelectorAll(".cpf").forEach((el) => {
    if (el instanceof HTMLInputElement) {
      // eslint-disable-next-line no-new
      new Cleave(el, {
        delimiters: [".", ".", "-"],
        blocks: [3, 3, 3, 2],
        numericOnly: true,
        delimiterLazyShow: true,
      });
    } else {
      el.innerHTML = el.innerHTML.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/g, "$1.$2.$3-$4");
    }
  });
});

if (!Push.Permission.has()) {
  Push.Permission.request(
    () => {},
    () => {
      console.log("Push.Permission.DENIED");
    }
  );
}

if (Push.Permission.has()) {
  window.setInterval(async () => {
    const rsMessages = await axios.get("/api/cfg/pushMessage/getNewMessages", { timeout: 7000 });

    if (rsMessages?.status === 200 && Array.isArray(rsMessages?.data)) {
      rsMessages.data.forEach((val) => {
        Push.create(val.mensagem, {
          // icon: $('link[rel="icon"]').attr("href"),
          requireInteraction: true,
          onClick() {
            if (val.url) {
              const win = window.open(val.url, "_blank");
              win.focus();
            } else {
              window.focus();
            }
            this.close();
          },
        });
      });
    } else {
      console.error("Erro - /api/cfg/pushMessage/getNewMessages");
    }
  }, 10000);
}

global.Sidebar = Sidebar;
