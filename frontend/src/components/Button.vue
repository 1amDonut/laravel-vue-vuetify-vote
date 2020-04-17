<template>
  <button
    class="btn btn-linkedin font-large"
    :style="{'background-color':color}"
    @click="callBtn()"
  >
    <slot>Button</slot>
  </button>
</template>
<script>
export default {
  props: ["color"],
  methods: {
    callBtn() {
      this.$emit("callBtn");
    }
  }
};
</script>
<style scoped>
/* 按鈕 */
.simple-text.heading span {
  position: relative;
  bottom: -3px;
  display: inline-block;
  padding: 0 30px 15px;
  border-bottom: 5px solid #007bff;
}

.simple-text.heading h3 {
  font-size: 1.6em;
  text-align: center;
  border-bottom: 1px solid #646464;
  margin-bottom: 15px;
}

.btn-linkedin {
  color: #ffffff;
  background-color: #73b8db;
  border-color: #4393bb;
}
.btn {
  display: inline-block;
  font-weight: 400;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  border: 1px solid transparent;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  border-radius: 0.25rem;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out,
    border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
</style>