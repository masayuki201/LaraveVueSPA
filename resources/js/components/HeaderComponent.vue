<template>
    <v-card>
        <v-toolbar
            dark
            src="https://cdn.vuetifyjs.com/images/backgrounds/vbanner.jpg"
            max-height="60"
        >
            <h2
                class="white--text"
            >
                Task管理アプリ
            </h2>
            <v-spacer></v-spacer>
            <v-btn
                class="hbtn white--text"
                color="#F57C00"
                elevation="10"
                :to="{name: 'task.list'}"
            >
                一覧
            </v-btn>
            <v-btn
                class="hbtn white--text"
                color="#F57C00"
                elevation="10"
                :to="{name: 'task.create'}"
            >
                追加する
            </v-btn>
        </v-toolbar>
    </v-card>
</template>
<script>
export default {
    name: "HeaderComponent"
}
</script>

<style>
.hbtn{
    margin: 0px 5px 0px 5px;
}
</style>
