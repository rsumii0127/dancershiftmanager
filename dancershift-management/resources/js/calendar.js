import { Calendar } from "fullcalendar";
import daygrid from "@fullcalendar/daygrid";

var calendarEl = document.getElementById("calendar");
var datamap = document.getElementById("calendar").attributes;
var data = datamap.getNamedItem("value").value;
console.log(data);
let calendar = new Calendar(calendarEl, {
    plugins: [daygrid],
    initialView: "dayGridMonth",
    headerToolbar: {
      left:"prev,next today",
      center: "title",
      right: "",
    },
    locale:"ja",
});
calendar.render();