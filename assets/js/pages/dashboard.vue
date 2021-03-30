<template>
  Oi {{ nome }}

  <Dialog></Dialog>

  <ColorPicker v-model="color2" />

  <FullCalendar :events="events" :options="options" />
</template>

<script>
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import interactionPlugin from "@fullcalendar/interaction";

export default {
  name: "Dashboard",
  data() {
    return {
      nome: "Pauluk",
      color2: "1976D2",
      options: {
        plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
        initialDate: "2019-01-01",
        headerToolbar: {
          left: "prev,next",
          center: "title",
          right: "dayGridMonth,timeGridWeek,timeGridDay",
        },
        editable: true,
        dateClick: (e) => {
          console.log(e);
        },
      },
      events: [
        {
          id: 1,
          title: "All Day Event",
          start: "2019-01-01",
        },
        {
          id: 2,
          title: "Long Event",
          start: "2019-01-07",
          end: "2019-01-10",
        },
        {
          id: 3,
          title: "Repeating Event",
          start: "2019-01-09T16:00:00",
        },
        {
          id: 4,
          title: "Repeating Event",
          start: "2019-01-16T16:00:00",
        },
        {
          id: 5,
          title: "Conference",
          start: "2019-01-11",
          end: "2019-01-13",
        },
        {
          id: 6,
          title: "Meeting",
          start: "2019-01-12T10:30:00",
          end: "2019-01-12T12:30:00",
        },
      ],
    };
  },
};
</script>
