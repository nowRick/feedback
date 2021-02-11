<template>
    <div class="settings">
        <app-loading v-if="loading"></app-loading>
        <form class="settings__form">
            <div class="form__el">
                <label>Выберите место хранения:</label>
                <select v-model="form.storage.type" v-on:change="changeSelectHandler">
                    <option value="database">База данных</option>
                    <option value="file">Файловое хранилище</option>
                    <option value="other_database">Другая база данных</option>
                </select>
                <div v-if="errors['storage.type']" class="form__el_error">{{ errors['storage.type'][0] }}</div>
            </div>

            <div v-if="other_database" class="form__el">
                <label>Введите драйвер:</label>
                <input type="text" v-model="form.settings.driver" placeholder="Драйвер">
                <div v-if="errors['settings.driver']" class="form__el_error">{{ errors['settings.driver'][0] }}</div>
            </div>

            <div v-if="other_database" class="form__el">
                <label>Введите url:</label>
                <input type="text" v-model="form.settings.url" placeholder="url">
                <div v-if="errors['settings.url']" class="form__el_error">{{ errors['settings.url'][0] }}</div>
            </div>

            <div v-if="other_database" class="form__el">
                <label>Введите хост:</label>
                <input type="text" v-model="form.settings.host" placeholder="Хост">
                <div v-if="errors['settings.host']" class="form__el_error">{{ errors['settings.host'][0] }}</div>
            </div>

            <div v-if="other_database" class="form__el">
                <label>Введите порт:</label>
                <input type="text" v-model="form.settings.port" placeholder="Порт">
                <div v-if="errors['settings.port']" class="form__el_error">{{ errors['settings.port'][0] }}</div>
            </div>

            <div v-if="other_database" class="form__el">
                <label>Введите базу данных:</label>
                <input type="text" v-model="form.settings.database" placeholder="База данных">
                <div v-if="errors['settings.database']" class="form__el_error">{{ errors['settings.database'][0] }}</div>
            </div>

            <div v-if="other_database" class="form__el">
                <label>Введите имя пользователя:</label>
                <input type="text" v-model="form.settings.username" placeholder="Имя пользователя">
                <div v-if="errors['settings.username']" class="form__el_error">{{ errors['settings.username'][0] }}</div>
            </div>

            <div v-if="other_database" class="form__el">
                <label>Введите пароль:</label>
                <input type="text" v-model="form.settings.password" placeholder="Пароль">
                <div v-if="errors['settings.password']" class="form__el_error">{{ errors['settings.password'][0] }}</div>
            </div>
            <div class="form__el">
                <button class="btn" :disabled="loading" type="button" @click.prevent="updateStorage">Отправить</button>
            </div>
        </form>
    </div>
</template>

<script>
    import AppLoading from "./AppLoading";
    import axios from "axios";

    export default {
        mounted() {
            this.getConfigData();
        },
        components: {
            loading: AppLoading
        },
        data: () => ({
            form: {
                storage: {
                    type: ''
                },
                settings: {
                    driver: '',
                    url: '',
                    host: '',
                    port: '',
                    database: '',
                    username: '',
                    password: '',

                },
            },
            loading: false,
            errors: false,
            other_database: false,
        }),
        methods: {
            changeSelectHandler() {
                if (this.form.storage.type === 'other_database') {
                    this.other_database = true;
                } else {
                    this.other_database = false;
                }
            },
            updateStorage() {
                this.loading = true;
                axios.patch('/api/feedback/settings', this.form, {
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
            getConfigData() {
                axios.get('/api/feedback/settings', {
                    headers: {
                        "Content-type": "application/json"
                    }
                })
                    .then(response => {
                        this.form.storage.type = response.data.storage;
                        this.changeSelectHandler();
                    })
                    .catch(error => {
                        console.log(error.response.data);
                    })
            },
        }
    }
</script>

<style>
    .settings {
        display: flex;
        width: 100%;
    }

    .settings__form {
        width: 100%;
        display: flex;
        flex-direction: column;
    }

    .settings__form .form__el {
        margin: 10px;
    }

    .settings__form .form__el select {
        margin-top: 10px;
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        box-sizing: border-box;
    }

    .settings__form .form__el input {
        margin-top: 10px;
        width: 100%;
        padding: 12px 15px;
        margin: 8px 0;
        box-sizing: border-box;
    }

    .settings__form .form__el .btn {
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

    .settings__form .form__el .btn:hover {
        cursor: pointer;
    }

    .settings__form .form__el .form__el_error {
        color: red;
        font-size: 12px;
        padding-left: 15px;
    }
</style>
