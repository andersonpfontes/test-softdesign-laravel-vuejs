<template>
  <div class="customer-list">
    <div class="data">
      <table class="ui celled table">
        <thead>
          <tr>
            <th style="width: 50px; text-align: center;">#</th>
            <th>Name</th>
            <th>Description</th>
            <th style="width: 148px;">Action</th>
          </tr>
        </thead>

        <tbody>
          <Book
            v-for="book in books"
            :key="book.id"
            :book="book"
            @onDelete="onDelete"
            @onEdit="onEdit"
          />
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import Book from "./Book.vue";
export default {
  name: "BookList",
  components: {
    Book
  },
  props: {
    books: {
      type: Array
    }
  },
  methods: {
    onDelete(id) {
      // window.console.log("Book list delete " + id);
      this.$emit("onDelete", id);
    },
    onEdit(data) {
       window.console.log("Book list edit " + data);
      this.$emit("onEdit", data);
    }
  }
};
</script>

<style scoped></style>
