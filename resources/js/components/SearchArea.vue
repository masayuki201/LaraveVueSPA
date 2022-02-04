<template>
    <div>
        <v-layout wrap>
            <v-flex sm4 pa-2>
              <!--タイトル-->
                <v-text-field
                    v-model="searchForm.title"
                    label="タイトル"
                >
                </v-text-field>
            </v-flex>
              <!--担当者-->
            <v-flex sm4 pa-2>
                <v-text-field
                    v-model="searchForm.person_in_charge"
                    label="担当者"
                >
                </v-text-field>
            </v-flex>
            <v-flex pa-2>
              <!--検索ボタン-->
                <v-btn
                    @click="clickHandler"
                >
                    検索
                </v-btn>
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
        //検索ボタンをクリックすると呼ばれる
        clickHandler() {
            let params = querystring.encode(this.searchForm);
            this.$emit("search", params);
        }
    }
};
</script>
