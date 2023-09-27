<template>
  <div id="app">
    <div class="ui fixed inverted menu vue-color">
      <div class="ui container">
        <a href="#" class="header item">Project VueJs FrontEnd - ApiRest</a>
      </div>
    </div>

    <div class="ui main container">
      <MyForm :form="form" @onFormSubmit="onFormSubmit" />
      <Loader v-if="loader" />
      <BookList
        :books="books"
        @onDelete="onDelete"
        @onEdit="onEdit"
      />
    </div>
  </div>
</template>

<script>
import axios from "axios";
import MyForm from "./components/MyForm";
import BookList from "./components/BookList.vue";
import Loader from "./components/Loader";

export default {
  name: "App",
  components: {
    MyForm,
    BookList,
    Loader
  },
  data() {
    return {
      url: "http://127.0.0.1:8000/api/products/view/all",
      books: [],
      form: {
        title: "",
        description: "",
        isEdit: false
      },
      loader: false
    };
  },
  methods: {
    getBooks() {
      this.loader = true;

      axios.get(this.url).then(data => {
        //console.log(data.data.data.data);
        this.books = data.data.data.data;
        //console.log(this.books);
        this.loader = false;
      });
    },
    deleteBooks(id) {
      this.loader = true;

      axios
        .delete(`${this.url}/${id}`)
        .then(() => {
          this.getBooks();
        })
        .catch(e => {
          alert(e);
        });
    },
    createBooks(data) {
      this.loader = true;

      axios
        .post(this.url, {
          title: data.data.data.data.title,
          description: data.data.data.data.description
        })
        .then(() => {
          this.getBooks();
        })
        .catch(e => {
          alert(e);
        });
    },
    editBooks(data) {
      console.log(data);
      this.loader = true;

      axios
        .put(`${this.url}/${data.id}`, {
          title: data.data.data.data.title,
          description: data.data.data.data.description
        })
        .then(() => {
          this.getBooks();
        })
        .catch(e => {
          alert(e);
        });
    },
    onDelete(id) {
      // window.console.log("app delete " + id);
      this.deleteBooks(id);
    },
    onEdit(data) {
       window.console.log("app edit ", data);
      this.form = data;
      this.form.isEdit = true;
    },
    onFormSubmit(data) {
      // window.console.log("app onFormSubmit", data);
      if (data.isEdit) {
        // call edit customer
        this.editBooks(data);
      } else {
        // call create customer
        this.createBooks(data);
      }
    }
  },
  created() {
    this.getBooks();
  }
};
</script>

<style>
.vue-color {
  background: #4144b8 !important;
}

.main.container {
  margin-top: 60px;
}

.submit-button {
  margin-top: 24px !important;
  float: right;
}

.data {
  margin-top: 15px;
}

thead tr th {
  background: #e0e0e0 !important;
}

.ui.inverted.dimmer {
  background-color: rgba(255, 255, 255, 0) !important;
}
</style>
