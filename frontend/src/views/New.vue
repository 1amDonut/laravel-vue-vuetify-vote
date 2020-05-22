<template>
  <div>
    <v-list-item>
      <v-list-item-content>
        <v-list-item-title>{{ form.activityName }}</v-list-item-title>
      </v-list-item-content>
      <v-spacer />

      <v-btn text color="primary" @click="dialog = false">取消</v-btn>
      <v-btn text v-if="disableFinishBtn" @click="send">送出</v-btn>
    </v-list-item>
    <!-- 分隔 -->
    <v-divider></v-divider>

    <v-card>
      <v-container>
        <v-row class="mx-2">
          <v-col cols="12">
            <!-- 
            Start of: Step 1
            Create Activity 
            -->
            <v-stepper v-model="e6" vertical>
              <v-stepper-step :complete="e6 > 1" step="1">建立投票活動</v-stepper-step>

              <v-stepper-content step="1">
                <v-card color="grey lighten-1" class="mb-12" height="200px"></v-card>

                <v-row>
                  <v-col cols="12" sm="2" md="2" class="text-center">問卷名稱</v-col>
                  <v-col cols="12" sm="10" md="10">
                    <v-text-field
                      v-model="form.activityName"
                      placeholder="投票活動"
                      label="標題"
                      :rules="nameRules"
                      outlined
                      required
                    />
                  </v-col>
                </v-row>

                <!-- 設定投票簡介 -->
                <v-row>
                  <v-col cols="12" sm="2" md="2" class="text-center">投票簡介</v-col>
                  <v-col cols="12" sm="10" md="10">
                    <!-- CKEditor -->
                    <ckeditor :editor="editor" v-model="form.introduction" :config="editorConfig"></ckeditor>
                  </v-col>
                </v-row>

                <!--設定投票說明  -->
                <v-row>
                  <v-col cols="12" sm="2" md="2" class="text-center">投票說明</v-col>
                  <v-col cols="12" sm="10" md="10">
                    <!-- CKEditor -->
                    <ckeditor
                      :editor="editor"
                      v-model="form.activityDescription"
                      :config="editorConfig"
                    ></ckeditor>
                    <!-- <v-textarea outlined v-model="form.Description" name="input-7-4" label="活動說明"></v-textarea> -->
                  </v-col>
                </v-row>
                <!-- /**
                *   method1
                *  :disabled="!(form.activityName.length != '')"
                */-->
                <v-btn color="primary" @click="e6 = 2" :disabled="isCreateSuccess">繼續</v-btn>

                <v-btn text>取消</v-btn>
              </v-stepper-content>

              <!-- 
                End of: Step 1
                Create Activity
              -->

              <!-- 
                Start of: Step 2
                Setting Custom data
              -->
              <v-stepper-step :complete="e6 > 2" step="2">一般設定</v-stepper-step>

              <v-stepper-content step="2">
                <!---->
                <v-row>
                  <v-col cols="12" sm="2" md="2" class="text-center">開放投票期間</v-col>
                  <!-- 開始時間 -->
                  <v-col cols="12" sm="5" md="5">
                    <v-menu
                      v-model="menu"
                      :close-on-content-click="false"
                      :nudge-right="40"
                      transition="scale-transition"
                      offset-y
                      min-width="290px"
                    >
                      <template v-slot:activator="{ on }">
                        <v-text-field
                          v-model="form.startDate"
                          label="開始日期"
                          prepend-icon
                          readonly
                          outlined
                          v-on="on"
                        ></v-text-field>
                      </template>
                      <v-date-picker v-model="form.startDate" @input="menu = false" locale="zh"></v-date-picker>
                    </v-menu>
                  </v-col>
                  <!-- 結束時間 -->
                  <v-col cols="12" sm="5" md="5">
                    <v-menu
                      v-model="menu2"
                      :close-on-content-click="false"
                      :nudge-right="40"
                      transition="scale-transition"
                      offset-y
                      min-width="290px"
                    >
                      <template v-slot:activator="{ on }">
                        <v-text-field
                          v-model="form.endDate"
                          label="結束日期"
                          prepend-icon
                          readonly
                          outlined
                          v-on="on"
                        ></v-text-field>
                      </template>
                      <!-- language set chinese locate default zh  -->
                      <v-date-picker v-model="form.endDate" @input="menu2 = false" locale="zh"></v-date-picker>
                    </v-menu>
                  </v-col>
                </v-row>

                <!-- 活動類別 EX:其他類、學習、研討會... -->
                <v-row>
                  <v-col cols="12" sm="2" md="2" class="text-center">活動類別</v-col>
                  <v-col cols="12" sm="5" md="5">
                    <v-select
                      :items="classify"
                      item-value="id"
                      item-text="className"
                      placeholder="必填"
                      outlined
                    ></v-select>
                  </v-col>
                </v-row>

                <!-- 設定投票數 規則未定 -->
                <v-row>
                  <v-col cols="12" sm="2" md="2" class="text-center">投票數</v-col>
                  <v-col cols="12" sm="5" md="5">
                    <v-text-field
                      type="number"
                      min="1"
                      v-model="form.voteQry"
                      outlined
                      placeholder="必填"
                    />
                  </v-col>
                </v-row>

                <!-- 設定是否需報名 -->
                <v-row>
                  <v-col cols="12" sm="2" md="2" class="text-center">是否報名</v-col>
                  <v-col cols="12" sm="5" md="5">
                    <v-select
                      outlined
                      :items="needSignupItem"
                      v-model="form.needSignup"
                      item-value="value"
                      item-text="name"
                      placeholder="必填"
                    ></v-select>
                  </v-col>
                </v-row>
                <!--  主辦單位 -->

                <v-row>
                  <v-col cols="12" sm="2" md="2" class="text-center">主辦單位</v-col>
                  <v-col cols="12" sm="5" md="5">
                    <!-- <v-select
                      outlined
                      :items="department"
                      item-value="DEP_NODE"
                      item-text="DEP_NAME"
                      placeholder="必填"
                    ></v-select>-->
                    <v-autocomplete
                      :items="department"
                      v-model="form.organizer"
                      color="white"
                      no-data="無"
                      item-text="DEP_NAME"
                      item-value="DEP_NODE"
                      locale="zh"
                      outlined
                    ></v-autocomplete>
                  </v-col>
                </v-row>
                <!-- 評分規則 -->
                <v-row>
                  <v-col cols="12" sm="2" md="2" class="text-center">評分規則</v-col>
                  <v-col cols="12" sm="5" md="5">
                    <v-select
                      outlined
                      :items="rulesItem"
                      v-model="form.rule"
                      item-value="value"
                      item-text="name"
                      placeholder="必填"
                    ></v-select>
                  </v-col>
                </v-row>

                <!-- 是否公開 -->
                <v-row>
                  <v-col cols="12" sm="2" md="2" class="text-center">是否公開</v-col>
                  <v-col cols="12" sm="5" md="5">
                    <v-switch label="公開" value="1" v-model="form.public"></v-switch>
                  </v-col>
                </v-row>

                <!-- 設定公告時間 -->
                <v-row>
                  <v-col cols="12" sm="2" md="2" class="text-center">公告時間</v-col>
                  <v-col cols="12" sm="5" md="5">
                    <v-select
                      outlined
                      :items="startAnnounceItem"
                      v-model="form.startAnnouncetime"
                      item-value="value"
                      item-text="name"
                      placeholder="必填"
                    ></v-select>
                  </v-col>
                </v-row>
                <!--  -->
                <v-btn color="primary" @click="e6 = 3" :disabled="isDisabled">繼續</v-btn>
                <v-btn text @click="e6 = 1">取消</v-btn>
              </v-stepper-content>

              <!--
                End of:
                Setting custom data
              -->

              <!--
                Start of:
                Add voting list by DataTable
              -->
              <v-stepper-step :complete="e6 > 3" step="3">加入投票項目</v-stepper-step>

              <v-stepper-content step="3">
                <v-card color="grey lighten-1" class="mb-12" height="200px"></v-card>
                <v-row>
                  <v-col cols="12">
                    <!-- use vuetify data-table -->
                    <v-data-table
                      :headers="candidate_headers"
                      :items="form.desserts"
                      sort-by="calories"
                      class="elevation-1"
                    >
                      <template v-slot:top>
                        <v-toolbar flat color="white">
                          <v-spacer></v-spacer>
                          <v-dialog v-model="dialog" max-width="500px">
                            <template v-slot:activator="{ on }">
                              <v-btn color="primary" dark class="mb-2" v-on="on">加入</v-btn>
                            </template>
                            <v-card>
                              <v-card-title>
                                <span class="headline">加入</span>
                              </v-card-title>

                              <!-- V-card  -->
                              <v-card-text>
                                <v-container>
                                  <v-row>
                                    <v-col cols="12" sm="6" md="6">
                                      <v-text-field v-model="editedItem.name" label="候選人"></v-text-field>
                                    </v-col>

                                    <v-col cols="12" sm="12" md="12">
                                      <v-text-field v-model="editedItem.remarks" label="備註"></v-text-field>
                                    </v-col>

                                    <v-col cols="12" sm="12" md="12">
                                      <v-file-input
                                        label="File input"
                                        ref="files"
                                        outlined
                                        dense
                                        v-model="file"
                                        @change="handleFileUpload()"
                                      ></v-file-input>
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
                        <v-icon small class="mr-2" @click="editItem(item)">mdi-pencil</v-icon>
                        <v-icon small @click="deleteItem(item)">mdi-delete</v-icon>
                      </template>
                      <template v-slot:no-data></template>
                    </v-data-table>

                    <!--
                    End of:
                    Add voting list by DataTable
                    -->
                  </v-col>
                </v-row>

                <v-row align="center" class="mr-0">
                  <v-avatar size="40px" class="mx-3"></v-avatar>
                </v-row>
                <v-btn color="primary" @click="e6 = 4">繼續</v-btn>
                <v-btn text @click="e6=2">取消</v-btn>
              </v-stepper-content>

              <!--
                Start of 
                setting vote list by dataTable
              -->
              <v-stepper-step step="4">可投票名單</v-stepper-step>
              <v-stepper-content step="4">
                <v-row>
                  <v-col cols="12">
                    <v-data-table
                      :headers="join_list_headers"
                      :items="form.allowDesserts"
                      sort-by="calories"
                      class="elevation-1"
                    >
                      <template v-slot:top>
                        <v-toolbar flat color="white">
                          <v-spacer></v-spacer>
                          <v-dialog v-model="allowList_dialog" max-width="500px">
                            <template v-slot:activator="{ on }">
                              <v-btn color="primary" dark class="mb-2" v-on="on">加入</v-btn>
                            </template>
                            <v-card>
                              <v-card-title>
                                <span class="headline">加入</span>
                              </v-card-title>

                              <!-- V-card  -->
                              <v-card-text>
                                <v-container>
                                  <v-row>
                                    <v-col cols="12" sm="6" md="6">
                                      <v-text-field v-model="allowEditedItem.name" label="名稱"></v-text-field>
                                    </v-col>

                                    <v-col cols="12" sm="12" md="12">
                                      <v-text-field v-model="allowEditedItem.develop" label="單位"></v-text-field>
                                    </v-col>

                                    <v-col cols="12" sm="12" md="12">
                                      <v-file-input
                                        label="File input"
                                        ref="files"
                                        outlined
                                        dense
                                        v-model="file"
                                        @change="handleFileUpload()"
                                      ></v-file-input>
                                    </v-col>
                                  </v-row>
                                </v-container>
                              </v-card-text>

                              <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn color="blue darken-1" text @click="closeByAllowTable">取消</v-btn>
                                <v-btn color="blue darken-1" text @click="saveByAllowTable">儲存</v-btn>
                              </v-card-actions>
                            </v-card>
                          </v-dialog>
                        </v-toolbar>
                      </template>
                      <template v-slot:item.actions="{ item }">
                        <v-icon small class="mr-2" @click="editByAllowItem(item)">mdi-pencil</v-icon>
                        <v-icon small @click="deleteByAllowItem(item)">mdi-delete</v-icon>
                      </template>
                      <template v-slot:no-data></template>
                    </v-data-table>
                  </v-col>
                </v-row>
                <v-btn color="primary" @click="disableFinishBtn = true">繼續</v-btn>
                <v-btn text @click="e6=3">取消</v-btn>
              </v-stepper-content>
            </v-stepper>

            <!--
              End of:
              Setting vote list by dataTable
            -->
          </v-col>
        </v-row>
      </v-container>
    </v-card>
  </div>
</template>
<script>
// import library
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import "@ckeditor/ckeditor5-build-classic/build/translations/zh.js";
import { mapState, mapActions } from "vuex";
export default {
  components: {
    // vButton
  },
  data() {
    return {
      editor: ClassicEditor,
      editorData: "",
      editorConfig: {
        // The configuration of the editor.
        language: "zh",
        ckfinder: {
          uploaded: -1,
          // url: "http://localhost/api/admin/upload",
          uploadUrl: "http://localhost/api/admin/upload",
          headers: {
            "X-CSRF-TOKEN": "CSFR-Token"
            // Authorization: "Bearer <JSON Web Token>"
          },
          options: {
            resourceType: "Images"
          }

          // 初步處理上傳邏輯返回json數據，包括uploaded（選項true / false）和url兩個細分
        }
      },
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
        //標題
        activityName: "",
        // 介紹
        introduction:
          "<p>謝謝您關注此次活動，請投下您這次最認同的項目。 <img src='https://autos.yahoo.com.tw/p/r/w1200/car-trim/April2020/86f0ee25b04090de368f8202649df887.jpeg' /></p>",
        //投票開始日期
        startDate: null,
        //投票結束日期
        endDate: null,
        //活動說明
        activityDescription:
          "<p>票選活動分成網路投票，採加權比重計分&nbsp;</p><p>\
          網路投票：(即日起至107.10.28 12:00為止)&nbsp;</p><p>\
          同學可在喜歡的活動照片中投下神聖的一票、每人得計一票。</p>",
        //活動類別
        selectType: "",
        //投票數
        voteQry: "",
        // 主辦單位
        organizer: "",
        // 需報名
        needSignup: "",
        // 投票規則
        rule: "",
        // 是否公開
        public: "",
        // 公開時間
        startAnnounceTime: "",
        //Excel名單
        file: [],
        // 候選名單資料集合
        desserts: [],
        // 可投票名單資料集合
        allowDesserts: []
      },
      nameRules: [
        val => !!val || "必填"
        // val =>
        //   (val && val.length <= 10) || "Name must be less than 10 characters"
      ],
      introductionRules: [val => !!val || "必填"],
      booking: 1,
      valid: true,
      // 候選名單dialog
      dialog: false,
      // 可投票名單dialog
      allowList_dialog: false,
      // 候選名單index
      editedIndex: -1,
      // 可投票名單index
      allowEditedIndex: -1,
      // 候選名單Model
      editedItem: {
        name: "",
        calories: 0,
        fat: 0,
        carbs: 0,
        protein: 0
      },
      // 可投票名單Model
      allowEditedItem: {
        name: "",
        calories: 0,
        fat: 0,
        carbs: 0,
        protein: 0
      },
      // 預設欄位值
      defaultItem: {
        name: "",
        calories: 0,
        fat: 0,
        carbs: 0,
        protein: 0
      },
      // 預設欄位值
      allowDefaultem: {
        name: "",
        dev: ""
      },
      // 設定公開選項時間
      startAnnounceItem: [
        {
          name: "前一天",
          value: "the day before"
        },
        {
          name: "前七天",
          value: "The first seven days"
        },
        {
          name: "前一個月",
          value: "The previous months"
        },
        {
          name: "前三個月",
          value: "The first three months"
        }
      ],
      disableFinishBtn: false
    };
  },
  created() {
    this.$store.dispatch("GET_CLASSIFY");
    this.$store.dispatch("GET_DEP");
  },
  methods: {
    ...mapActions(["POST_ACTIVITY"]),
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
    },
    editItem(item) {
      this.editedIndex = this.form.desserts.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialog = true;
    },
    editByAllowItem(item) {
      this.allowEditedIndex = this.form.allowDesserts.indexOf(item);
      this.allowEditedItem = Object.assign({}, item);
      this.allowList_dialog = true;
    },
    deleteItem(item) {
      const index = this.form.desserts.indexOf(item);
      confirm("Are you sure you want to delete this item?") &&
        this.form.desserts.splice(index, 1);
    },
    deleteByAllowItem(item) {
      const index = this.form.allowDesserts.indexOf(item);
      confirm("Are you sure you want to delete this item?") &&
        this.form.allowDesserts.splice(index, 1);
    },
    close() {
      this.dialog = false;
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
    },
    closeByAllowTable() {
      this.allowList_dialog = false;
      this.$nextTick(() => {
        this.allowEditedItem = Object.assign({}, this.allowDefaultem);
        this.allowEditedIndex = -1;
      });
    },

    save() {
      if (this.editedIndex > -1) {
        Object.assign(this.form.desserts[this.editedIndex], this.editedItem);
      } else {
        this.form.desserts.push(this.editedItem);
      }
      this.close();
    },
    saveByAllowTable() {
      if (this.allowEditedIndex > -1) {
        Object.assign(
          this.form.allowDesserts[this.allowEditedIndex],
          this.allowEditedItem
        );
      } else {
        this.form.allowDesserts.push(this.allowEditedItem);
      }
      this.closeByAllowTable();
    },
    // 送出
    send() {
      this.POST_ACTIVITY(this.form).then(data => {
        console.log(data);
      });
    }
  },
  computed: {
    ...mapState({
      classify: state => state.admin.classify,
      department: state => state.admin.dep,
      candidate_headers: state => state.admin.candidateHeaders,
      join_list_headers: state => state.admin.joinHeaders,
      needSignupItem: state => state.admin.needSignupItem,
      rulesItem: state => state.admin.rulesItem
    }),
    isCreateSuccess() {
      if (!this.form.activityName) return true;
      if (!this.form.introduction) return true;
      return false;
    },
    isDisabled() {
      if (!this.form.startDate) return true;
      if (!this.form.endDate) return true;
      if (!this.form.voteQry) return true;
      return false;
    }
  }
};
</script>