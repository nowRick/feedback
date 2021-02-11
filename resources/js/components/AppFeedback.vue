<template>
    <div class="feedback">
        <app-loading v-if="loading"></app-loading>
        <form class="feedback__form">
            <div class="form__el">
                <label>Введите ваше имя:</label>
                <input type="text" v-model="form.name" placeholder="Имя">
                <div v-if="errors.name" class="form__el_error">{{ errors.name[0] }}</div>
            </div>

            <div class="form__el">
                <label>Введите телефон:</label>
                <input v-model="form.phone" type="text" placeholder="Телефон">
                <div v-if="errors.phone" class="form__el_error">{{ errors.phone[0] }}</div>
            </div>

            <div class="form__el">
                <label>Введите текст заявки:</label>
                <textarea v-model="form.application" type="text" rows="5" placeholder="Текст заявки"></textarea>
                <div v-if="errors.application" class="form__el_error">{{ errors.application[0] }}</div>
            </div>

            <div class="form__el">
                <button class="btn" :disabled="loading" type="button" @click.prevent="storeApplication">Отправить</button>
            </div>
        </form>
    </div>
</template>

<script>
    import AppLoading from "./AppLoading";
    import axios from "axios"

    export default {
        components: {
            loading: AppLoading
        },
        data: () => ({
            form: {
                name: '',
                phone: '',
                application: '',
            },
            loading: false,
            errors: false,
        }),
        methods: {
            storeApplication() {
                this.loading = true;
                axios.post('/api/feedback', this.form, {
                    headers: {
                        "Content-type": "application/json"
                    }
                })
                .then(response => {
                    setTimeout(() => {
                        this.loading = false;
                        this.errors = false;
                    }, 500);
                })
                .catch(error => {
                    setTimeout(() => {
                        this.loading = false;
                        this.errors = error.response.data.errors ?? false;
                    }, 500);
                })
            },
        }
    }
</script>

<style>
    .feedback {
        display: flex;
        width: 100%;
    }

    .feedback__form {
        width: 100%;
        display: flex;
        flex-direction: column;
    }

    .feedback__form .form__el {
        margin: 10px;
    }

    .feedback__form .form__el input, .feedback__form .form__el textarea {
        margin-top: 10px;
        width: 100%;
        padding: 12px 15px;
        margin: 8px 0;
        box-sizing: border-box;
    }

    .feedback__form .form__el textarea {
        resize: vertical;
    }

    .feedback__form .form__el .btn {
        display: flex;
        align-items: center;
        background-color: MediumSeaGreen;
        color: white;
        border: none;
        padding: 15px;
        font-size: 16px;
        font-weight: bold;
        margin-right: 3px;
        border-radius: 5px;
    }

    .feedback__form .form__el .btn:hover {
        cursor: pointer;
    }

    .feedback__form .form__el .form__el_error {
        color: red;
        font-size: 12px;
        padding-left: 15px;
    }
</style>
