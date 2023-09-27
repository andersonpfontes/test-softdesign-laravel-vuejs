<template>
  <tr>
    <td>{{ book.id }}</td>
    <td>{{ book.title }} </td>
    <td>{{ book.description }}</td>
    <td>
      <button class="mini ui blue button" @click="onEdit">Edit</button>
      <button class="mini ui red button" @click="onDelete">Delete</button>
    </td>
  </tr>
</template>

<script>
export default {
  name: "Book",
  props: {
    book: {
      type: Object
    }
  },
  methods: {
    onDelete() {
      // window.console.log("Book delete " + this.customer.id);
      this.$emit("onDelete", this.Book.id);
    },
    onEdit() {
       window.console.log("Book edit " + this.book.id);
      this.$emit("onEdit", this.book);
    }
  }
};
</script>

<style scoped></style>
