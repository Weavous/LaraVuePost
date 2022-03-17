export default class Comment {
    constructor(text, user_id, post_id, comment_id) {
        this.text = text;
        this.user_id = user_id;
        this.post_id = post_id;
        this.comment_id = comment_id;
    }

    failsOnComment() {
        return !this.checkText() || !this.checkUser() || !this.checkComment();
    }

    failsOnPost() {
        return !this.checkText() || !this.checkUser() || !this.checkPost();
    }

    checkText() {
        return this.text.length > 0 && this.text.length <= 128;
    }

    checkUser() {
        return [0, null, undefined].includes(this.user_id) === false;
    }

    checkComment() {
        return [0, null, undefined].includes(this.comment_id) === false;
    }

    checkPost() {
        return [0, null, undefined].includes(this.post_id) === false;
    }

    message() {
        return "Check the form fields. One or more fields are missing or incorrect";
    }
}