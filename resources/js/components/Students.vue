<template>
  <table class="table is-bordered is-striped is-fullwidth">
    <thead>
      <tr>
        <th>Attendance</th>
        <th>Student ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr v-bind:key="student.id" v-for="student in students">
        <td>
          <div class="control">
            <label class="radio">
              <input
                type="radio"
                :value="1"
                v-model="student.isPresent"
                :checked="student.isPresent"
                @change="$emit('check-attendance', student)"
              />
              Present
            </label>
            <label class="radio">
              <input
                type="radio"
                :value="0"
                v-model="student.isPresent"
                :checked="!student.isPresent"
                @change="$emit('check-attendance', student)"
              />
              Absent
            </label>
          </div>
        </td>
        <td>{{student.studentId}}</td>
        <td>{{student.firstName}}</td>
        <td>{{student.lastName}}</td>
        <td>{{student.email}}</td>
      </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  name: "Students",
  props: {
    students: Array
  }
};
</script>

<style scoped>
</style>