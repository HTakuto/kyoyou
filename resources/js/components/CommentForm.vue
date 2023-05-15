<template>
    <div>
      <form @submit.prevent="addComment" style="margin-bottom: 30px;">
        <div class="form-group">
          <input type="hidden" name="article_id" :value="articleId">
          <textarea class="form-control" v-model="content" rows="4" placeholder="コメントを入力してください"></textarea>
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-primary">コメントする</button>
        </div>
      </form>
    </div>
  </template>

  <script>
  export default {
    props: {
      articleId: {
        type: Number,
        required: true,
      },
    },
    data() {
      return {
        content: "",
      };
    },
    methods: {
      addComment() {
        axios
          .post("/comments", {
            content: this.content,
            article_id: this.articleId,
          })
          .then((response) => {
            this.content = "";
            this.$emit("comment-added", response.data);
          })
          .catch((error) => {
            console.error(error);
          });
      },
      scrollToBottom() {
            setTimeout(() => {
                const container = document.getElementById("comments-container");
                container.scrollTop = container.scrollHeight;
            }, 0);
      },
    },
  };
  </script>
