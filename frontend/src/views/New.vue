<template>
  <div>
    <v-list-item>
      <v-list-item-content>
        <v-list-item-title>{{ form.title }}</v-list-item-title>
      </v-list-item-content>
      <v-spacer />
      <v-btn text color="primary" @click="dialog = false">取消</v-btn>
      <v-btn text @click="dialog = false">送出</v-btn>
    </v-list-item>

    <v-divider></v-divider>

    <v-card>
      <v-container>
        <v-row class="mx-2">
          <v-col cols="12">
            <!--***********************
              *
              * 建立投票活動
              *
            ***********************-->
            <v-stepper v-model="e6" vertical>
              <v-stepper-step :complete="e6 > 1" step="1">
                建立投票活動
                <!-- <small>Summarize if needed</small> -->
              </v-stepper-step>

              <v-stepper-content step="1">
                <!--***********************
              * 標題
                ***********************-->
                <v-card color="grey lighten-1" class="mb-12" height="200px"></v-card>

                <v-row>
                  <v-col cols="4">問卷名稱</v-col>
                  <v-col cols="8">
                    <v-text-field v-model="form.title" placeholder="投票活動" label="標題" :rules="nameRules" outlined
                      required />
                  </v-col>
                </v-row>
                <v-row>
                  <v-col cols="4">歡迎文字</v-col>
                  <v-col cols="8">
                    <v-textarea outlined name="input-7-4" label="歡迎文字"></v-textarea>
                  </v-col>
                </v-row>
                <v-btn color="primary" @click="e6 = 2" :disabled="!(form.title.length != '')">繼續</v-btn>

                <v-btn text>取消</v-btn>
              </v-stepper-content>

              <v-stepper-step :complete="e6 > 2" step="2">一般設定</v-stepper-step>

              <v-stepper-content step="2">
                <!--***********************
                    * 一般設定
                ***********************-->
                <v-col cols="6">
                  <v-menu v-model="menu" :close-on-content-click="false" :nudge-right="40" transition="scale-transition"
                    offset-y min-width="290px">
                    <template v-slot:activator="{ on }">
                      <v-text-field v-model="form.startDate" label="開始日期" prepend-icon readonly v-on="on">
                      </v-text-field>
                    </template>
                    <v-date-picker v-model="form.startDate" @input="menu = false" locale="zh"></v-date-picker>
                  </v-menu>
                </v-col>
                <v-col cols="6">
                  <v-menu v-model="menu2" :close-on-content-click="false" :nudge-right="40"
                    transition="scale-transition" offset-y min-width="290px">
                    <template v-slot:activator="{ on }">
                      <v-text-field v-model="form.endDate" label="結束日期" prepend-icon readonly v-on="on"></v-text-field>
                    </template>
                    <v-date-picker v-model="form.endDate" @input="menu2 = false" locale="zh"></v-date-picker>
                  </v-menu>
                </v-col>
                <v-col cols="12">
                  <v-textarea outlined v-model="form.Description" name="input-7-4" label="活動說明"></v-textarea>
                </v-col>
                <v-col cols="6">
                  <v-select :items="items" label="活動類別"></v-select>
                  <!-- <v-text-field prepend-icon="mdi-account-card-details-outline" placeholder="開始日期" /> -->
                </v-col>
                <v-col cols="6">
                  <v-text-field type="number" min="1" v-model="form.votes" placeholder="投票數" />
                </v-col>
                <v-btn color="primary" @click="e6 = 3" :disabled="isDisabled">繼續</v-btn>
                <v-btn text @click="e6 = 1">取消</v-btn>
              </v-stepper-content>
              <!--***********************
                    * 加入投票項目包含名稱，說明
              ***********************-->
              <v-stepper-step :complete="e6 > 3" step="3">加入投票項目</v-stepper-step>

              <v-stepper-content step="3">
                <v-card color="grey lighten-1" class="mb-12" height="200px"></v-card>
                <v-row>
                  <v-col cols="12">
                    <v-data-table :headers="headers" :items="desserts" sort-by="calories" class="elevation-1">
                      <template v-slot:top>
                        <v-toolbar flat color="white">
                          <v-toolbar-title>My CRUD</v-toolbar-title>
                          <v-divider class="mx-4" inset vertical></v-divider>
                          <v-spacer></v-spacer>
                          <v-dialog v-model="dialog" max-width="500px">
                            <template v-slot:activator="{ on }">
                              <v-btn color="primary" dark class="mb-2" v-on="on">New Item</v-btn>
                            </template>
                            <v-card>
                              <v-card-title>
                                <span class="headline">{{ formTitle }}</span>
                              </v-card-title>

                              <v-card-text>
                                <v-container>
                                  <v-row>
                                    <v-col cols="12" sm="6" md="4">
                                      <v-select :items="items" filled label="單位"></v-select>
                                    </v-col>
                                    <v-col cols="12" sm="6" md="4">
                                      <v-text-field v-model="editedItem.calories" label="Calories"></v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="6" md="4">

                                      <v-text-field v-model="editedItem.name" label="候選人"></v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="6" md="4">
                                      <v-text-field v-model="editedItem.carbs" label="Carbs (g)"></v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="6" md="4">
                                      <v-text-field v-model="editedItem.protein" label="Protein (g)"></v-text-field>
                                    </v-col>
                                  </v-row>
                                </v-container>
                              </v-card-text>

                              <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn color="blue darken-1" text @click="close">取消</v-btn>
                                <v-btn color="blue darken-1" text @click="save">儲存</v-btn>
                              </v-card-actions>
                            </v-card>
                          </v-dialog>
                        </v-toolbar>
                      </template>
                      <template v-slot:item.actions="{ item }">
                        <v-icon small class="mr-2" @click="editItem(item)">
                          mdi-pencil
                        </v-icon>
                        <v-icon small @click="deleteItem(item)">
                          mdi-delete
                        </v-icon>
                      </template>
                      <template v-slot:no-data>
                        <v-btn color="primary" @click="initialize">Reset</v-btn>
                      </template>
                    </v-data-table>
                  </v-col>
                </v-row>

                <v-row align="center" class="mr-0">
                  <v-avatar size="40px" class="mx-3">
                  </v-avatar>
                </v-row>
                <v-btn color="primary" @click="e6 = 4">繼續</v-btn>
                <v-btn text>取消</v-btn>
              </v-stepper-content>
              <!--***********************
                    * 可投票名單
              ***********************-->
              <v-stepper-step step="4">可投票名單</v-stepper-step>
              <v-stepper-content step="4">
                <v-file-input label="File input" ref="files" outlined dense v-model="file" @change="handleFileUpload()">
                </v-file-input>
                <v-row>
                  <v-col cols="12">
                    <v-data-table :headers="headers" :items="desserts" sort-by="calories" class="elevation-1">
                      <template v-slot:top>
                        <v-toolbar flat color="white">
                          <v-toolbar-title>My CRUD</v-toolbar-title>
                          <v-divider class="mx-4" inset vertical></v-divider>
                          <v-spacer></v-spacer>
                          <v-dialog v-model="dialog" max-width="500px">
                            <template v-slot:activator="{ on }">
                              <v-btn color="primary" dark class="mb-2" v-on="on">New Item</v-btn>
                            </template>
                            <v-card>
                              <v-card-title>
                                <span class="headline">{{ formTitle }}</span>
                              </v-card-title>

                              <v-card-text>
                                <v-container>
                                  <v-row>
                                    <v-col cols="12" sm="6" md="4">
                                      <v-select :items="items" filled label="單位"></v-select>
                                    </v-col>
                                    <v-col cols="12" sm="6" md="4">
                                      <v-text-field v-model="editedItem.calories" label="Calories"></v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="6" md="4">

                                      <v-text-field v-model="editedItem.name" label="候選人"></v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="6" md="4">
                                      <v-text-field v-model="editedItem.carbs" label="Carbs (g)"></v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="6" md="4">
                                      <v-text-field v-model="editedItem.protein" label="Protein (g)"></v-text-field>
                                    </v-col>
                                  </v-row>
                                </v-container>
                              </v-card-text>

                              <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn color="blue darken-1" text @click="close">取消</v-btn>
                                <v-btn color="blue darken-1" text @click="save">儲存</v-btn>
                              </v-card-actions>
                            </v-card>
                          </v-dialog>
                        </v-toolbar>
                      </template>
                      <template v-slot:item.actions="{ item }">
                        <v-icon small class="mr-2" @click="editItem(item)">
                          mdi-pencil
                        </v-icon>
                        <v-icon small @click="deleteItem(item)">
                          mdi-delete
                        </v-icon>
                      </template>
                      <template v-slot:no-data>
                        <v-btn color="primary" @click="initialize">Reset</v-btn>
                      </template>
                    </v-data-table>
                  </v-col>
                </v-row>
                <v-btn color="primary" @click="e6 = 1">Continue</v-btn>
                <v-btn text>Cancel</v-btn>
              </v-stepper-content>
            </v-stepper>
          </v-col>
        </v-row>
      </v-container>
    </v-card>
  </div>
</template>
<script>
  import {
    mapState
  } from "vuex";
  // import vButton from "../components/Button";
  import axios from "axios";
  export default {
    components: {
      // vButton
    },
    data() {
      return {
        //紀錄投票項目 預設顯示一個欄位
        itemCount: 1,
        menu: "",
        menu2: "",
        items: [],
        //上傳檔案
        file: null,
        //stepper
        e6: 1,
        rules: {
          age: [val => val < 10 || `I don't believe you!`],
          animal: [val => (val || "").length > 0 || "This field is required"],
          name: [val => (val || "").length > 0 || "問卷標題不能空白"]
        },
        form: {
          title: "", //標題
          startDate: null, //投票開始日期
          endDate: null, //投票結束日期
          Description: "", //活動說明
          selectType: "", //活動類別
          votes: "", //投票數
          file: [] //Excel名單
        },
        nameRules: [
          val => !!val || "必填",
          // val =>
          //   (val && val.length <= 10) || "Name must be less than 10 characters"
        ],
        booking: 1,
        valid: true,
        dialog: false,
        allowDialog: false,
        headers: [{
            text: 'Dessert (100g serving)',
            align: 'start',
            sortable: false,
            value: 'name',
          },
          {
            text: '項目',
            value: 'item'
          },
          {
            text: 'Fat (g)',
            value: 'fat'
          },
          {
            text: 'Carbs (g)',
            value: 'carbs'
          },
          {
            text: 'Protein (g)',
            value: 'protein'
          },
          {
            text: 'Actions',
            value: 'actions',
            sortable: false
          },
        ],
        desserts: [],
        editedIndex: -1,
        editedItem: {
          name: '',
          calories: 0,
          fat: 0,
          carbs: 0,
          protein: 0,
        },
        defaultItem: {
          name: '',
          calories: 0,
          fat: 0,
          carbs: 0,
          protein: 0,
        },
      };
    },
    created() {
      this.initialize()
    },
    methods: {
      submit() {
        this.$nextTick(() => this.reset());
      },
      reset() {
        // Reset all value
        this.code = "";
        this.date = null;
        this.time = null;
        this.experience = "";
        this.experiences = [];

        // Reset error message
        this.errors.clear();
        this.$validator.reset();
        this.booking = 1;
      },
      handleFileUpload() {
        let formData = new FormData();
        formData.append("file", this.file);
        //use axios
        axios
          .post("", formData, {
            headers: {
              "Content-Type": "multipart/form-data"
            }
          })
          .then(() => {
            console.log("SUCCESS");
          })
          .catch(() => {
            console.log("ERROR");
          });
      },
      initialize() {
        this.desserts = [{
          name: 'Frozen Yogurt',
          calories: 159,
          fat: 6.0,
          carbs: 24,
          protein: 4.0,
        }, ]
      },

      editItem(item) {
        this.editedIndex = this.desserts.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true
      },
      editAllowItem(item) {
        this.editedIndex = this.desserts.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true
      },
      deleteItem(item) {
        const index = this.desserts.indexOf(item)
        confirm('Are you sure you want to delete this item?') && this.desserts.splice(index, 1)
      },
      deleteAllowItem(item) {
        const index = this.desserts.indexOf(item)
        confirm('Are you sure you want to delete this item?') && this.desserts.splice(index, 1)
      },

      close() {
        this.dialog = false
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        })
      },
      clostAllowTable() {
        this.allowDialog = false

      },

      save() {
        if (this.editedIndex > -1) {
          Object.assign(this.desserts[this.editedIndex], this.editedItem)
        } else {
          this.desserts.push(this.editedItem)
        }
        this.close()
      },
      saveAllowTable() {

      }
    },
    computed: {
      ...mapState({
        item_headers:state=>state.product.ItemHeaders
      }),
      isDisabled() {
        if (!this.form.startDate) return true;
        if (!this.form.endDate) return true;
        if (!this.form.Description) return true;
        if (!this.form.votes) return true;
        return false;
      }
    }
  };
</script>