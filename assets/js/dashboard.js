import { createApp } from "vue";
import PrimeVue from "primevue/config";
import Dialog from "primevue/dialog";
import ColorPicker from "primevue/colorpicker";
import "primeflex/primeflex.css";
import "primevue/resources/themes/saga-blue/theme.css"; // theme
import "primevue/resources/primevue.min.css"; // core css
import "primeicons/primeicons.css";
import FullCalendar from "primevue/fullcalendar";

import App from "./pages/dashboard";

// let a = {};
// let b = a.?bla;

const app = createApp(App);

app.use(PrimeVue);

app.component("Dialog", Dialog);
app.component("ColorPicker", ColorPicker);
app.component("FullCalendar", FullCalendar);

app.mount("#app");

// console.log("em dashboard.js com PrimeVue");
