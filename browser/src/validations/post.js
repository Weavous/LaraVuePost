export default class Post {
    constructor(name, text, user_id) {
        this.name = name;
        this.text = text;
        this.user_id = user_id;
    }

    fails() {
        return !this.checkUser() || !this.checkTitle() || !this.checkText();
    }

    checkUser() {
        return [0, null, undefined].includes(this.user_id) === false;
    }

    checkTitle() {
        return this.name.length > 0;
    }

    checkText() {
        return this.text.length >= 64 && this.text.length <= 512;
    }

    message() {
        if (!this.checkUser()) {
            return "Check the user combo again, an error occuried!";
        }

        if (!this.checkTitle()) {
            return "You must create a title for your post!";
        }

        if (!this.checkText()) {
            return "The post text must to be between 64 and 512 characters!";
        }

        return "Check the form fields. One or more fields are missing or incorrect";
    }
}