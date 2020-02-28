<template>
    <v-row align="center" justify="center">
        <v-flex xs9>
            <v-text-field label="輸入自選驗證碼（至少四碼）" :loading="loader"></v-text-field>
           
            <v-btn class="ma-2" tile outlined color="success" @click="loader='loading'">
                領票
            </v-btn>
        </v-flex>
        <v-flex xs9>
            <!-- <v-card>
                <v-card-text>
                    <Description />
                    <v-card>
                        <v-card-text>
                            驗票馬仕每個自由選擇的一組號碼（四碼），主要是用來計算票根
                            及驗證每一張選擇是否已被記入候選人的票數上。
                            由於票根共有６４個字元，不容易記憶。因此僅需要濟助個人驗票碼，即可利用驗票碼及被選舉人姓名來計算票根。
                            注意:系統部會記住個人驗票碼，若遺失個人驗票碼將無法進行驗票，
                            請自行妥善保管。
                        </v-card-text>
                    </v-card>
                </v-card-text>
            </v-card> -->
            <Description />
            <v-card>
                <v-card-text>
                    驗票馬仕每個自由選擇的一組號碼（四碼），主要是用來計算票根
                    及驗證每一張選擇是否已被記入候選人的票數上。
                    由於票根共有64個字元，不容易記憶。因此僅需要濟助個人驗票碼，即可利用驗票碼及被選舉人姓名來計算票根。
                    注意:系統部會記住個人驗票碼，若遺失個人驗票碼將無法進行驗票，
                    請自行妥善保館。
                </v-card-text>
            </v-card>
        </v-flex>
    </v-row>
</template>
<script>
    import Description from '../components/Description'
    export default {
        components: {
            Description,
        },
        data() {
            return {
                loader: null,
                loading: false,
            }
        }
    }
</script>