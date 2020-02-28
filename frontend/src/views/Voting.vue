<template>
    <!-- fill-height 垂直致中 -->
    <v-container class="  px-auto">

        <v-row align="center" justify="center">
            <v-col cols="12">
                <div style="border-bottom: 2px solid #00387b" class="Block_incontent">
                    <h1>投票</h1>
                </div>
            </v-col>

            <v-col cols="12">

                <v-card color="grey lighten-1" class="mb-12" height="200px"></v-card>
            </v-col>


            <v-col cols="12">
                <label class="css-1ftldnc">請選擇 至少{{total}}個選項 （已選擇{{count}}個）</label>
                <div class="css-1223n1t">
                    <span class='css-1s2dlqo'>請再選{{total-count}}個</span>
                </div>
            </v-col>


            <v-col cols="12">
                <v-card-text>

                    <Activity v-for="(activity, index) in activities" :key="index" :activity="activity"
                        @childMethod="handleClick(index)" />

                </v-card-text>
            </v-col>
            <v-col cols="6">
                <v-btn block color="error" dark height="50">放棄投票</v-btn>


            </v-col>
            <v-col cols="6">
                <v-btn block color="success" dark height="50" @click="finish()">完成投票</v-btn>


            </v-col>

        </v-row>
    </v-container>
</template>
<script>
    import Activity from '../components/Activity'
    export default {
        components: {
            Activity,
        },
        data() {
            return {
                activities: [{
                        title: '賈希謙',
                        uid: 1579414903608,
                        text: "aa",
                        vote: false
                    },
                    {
                        title: '黃曼婷',
                        uid: 1579414903608,
                        text: "aa",
                        vote: false
                    }
                ],
                total: 1,
                count: 0,
            }
        },
        methods: {
            handleClick(index) {

                if (this.activities[index].vote == true) {
                    this.activities[index].vote = false;
                    this.count--;
                } else {
                    if (this.total > this.count) {
                        this.activities[index].vote = true;

                        this.count++;
                    }
                }


            },
            finish() {
                console.log('finish');
            }
        }
    }
</script>
<style scoped>
    /* .Block_incontent h1 {
        font-size: 1.375em;
        background-color: #fcce30;
        color: #333;
        padding: 6px 20px 6px 20px;
        position: relative;
        margin: 0 0 20px 0;
        clear: both;
        line-height: 140%;
        border-radius: 5px;
    } */
</style>