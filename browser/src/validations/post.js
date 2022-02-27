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
}