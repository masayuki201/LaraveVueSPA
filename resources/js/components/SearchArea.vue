<template>
    <div>
        <v-layout wrap>
            <v-flex sm4 pa-2>
                <v-text-field v-model="searchForm.title" label="タイトル"></v-text-field>
            </v-flex>
            <v-flex sm4 pa-2>
                <v-text-field v-model="searchForm.person_in_charge" label="担当者"></v-text-field>
            </v-flex>
            <v-flex pa-2>
                <v-btn @click="clickHandler">検索</v-btn>
            </v-flex>
        </v-layout>
    </div>
</template>

<script>
const querystring = require("querystring");
export default {
    data() {
        return {
            searchForm: {
                title: "",
                person_in_charge: ""
            }
        };
    },
    methods: {
        clickHandler() {
            let params = querystring.encode(this.searchForm);
            this.$emit("search", params);
        }
    }
};
</script>

