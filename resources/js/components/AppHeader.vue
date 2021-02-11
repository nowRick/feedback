<template>
<div class="header">
    <div class="header__caption">
        <h3>{{ headerCaption }}</h3>
    </div>
    <div class="header__menu">
        <nav class="btn-group">

            <span v-for="link in links" class="btn-group__btn">
                <router-link :to="link.href">{{ link.title }}</router-link>
            </span>
        </nav>
    </div>
</div>
</template>

<script>
    export default {
        data() {
            return {
                links: [
                    {
                        title: 'Форма обратной связи',
                        href: '/feedback'
                    },
                    {
                        title: 'Настройки',
                        href: '/feedback/settings'
                    }
                ],
                headerCaption: 'Lamaikin Anton Feedback App'
            };
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>
    .header {
        display: flex;
        justify-content: space-between;
        font-size: 20px;
        color: #213270;
        border-bottom: 3px solid black;
        margin-bottom: 10px;
    }

    .btn-group {
        display: flex;
    }

    .header__menu .btn-group .btn-group__btn {
        display: flex;
        align-items: center;
        border: 2px solid #213299;
        padding: 5px;
        font-size: 16px;
        font-weight: bold;
        margin-right: 3px;
        border-radius: 5px;
    }

    .header__menu .btn-group .btn-group__btn a{
        color: #213270;
        text-decoration: none;
    }

    .header__menu .btn-group .btn-group__btn a:hover {
        text-decoration: underline;
    }

    .header__menu .btn-group .btn-group__btn .router-link-active {
        text-decoration: underline;
    }
</style>
