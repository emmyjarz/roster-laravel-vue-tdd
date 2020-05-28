<template>
  <div>
    <h1 class="title">Example Course Attendance For {{todayDateTime.toLocaleDateString()}}</h1>

    <Students :students="students" v-on:check-attendance="checkAttendance" />

    <div class="buttons has-addons">
      <button
        type="button"
        class="button is-outlined is-link"
        :disabled="!pagination.prevPageUrl"
        @click="fetchStudents(pagination.prevPageUrl)"
      >Previous</button>
      <button
        type="button"
        class="button is-outlined is-link"
      >{{pagination.currentPage}} of {{pagination.lastPage}}</button>
      <button
        type="button"
        class="button is-outlined is-link"
        :disabled="!pagination.nextPageUrl"
        @click="fetchStudents(pagination.nextPageUrl)"
      >Next</button>
    </div>
  </div>
</template>

<script>
import Students from "./components/Students";
export default {
  name: "App",
  components: {
    Students
  },
  data() {
    return {
      students: [],
      pagination: {},
      todayDateTime: new Date()
    };
  },
  methods: {
    fetchStudents(pageUrl) {
      pageUrl = pageUrl || "/api";
      axios
        .get(pageUrl)
        .then(res => {
          this.students = res.data.data;
          this.makePagination(res.data.meta, res.data.links);
        })
        .catch(err => console.log(err));
    },
    checkAttendance(student) {
      let uri = `/api/student-attendances/${student.id}`;
      axios
        .put(uri, {
          is_present: student.isPresent
        })
        .then(res => {
          if (res.data.status !== "success") {
            this.updateAttendanceMsg(
              "Cannot Check Attendance, Please Contact Admin",
              "error"
            );
          } else {
            this.updateAttendanceMsg("Attendance Updated");
          }
        })
        .catch(err => console.log(err));
    },
    makePagination(meta, links) {
      let pagination = {
        currentPage: meta.current_page,
        lastPage: meta.last_page,
        nextPageUrl: links.next,
        prevPageUrl: links.prev
      };
      this.pagination = pagination;
    },
    updateAttendanceMsg(msg = "", icon = "success") {
      let base = {
        position: "top-end",
        width: "300px",
        title: msg,
        showConfirmButton: false
      };
      let modal = {};
      icon === "success"
        ? (modal = { ...base, timer: 500 })
        : (modal = { ...base, icon, showConfirmButton: true });
      this.$swal.fire(modal);
    }
  },
  created() {
    this.fetchStudents();
  }
};
</script>

<style scoped>
</style>