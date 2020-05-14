import $http from "./config";
const RESOURCE_NAME = "/todos";
export default {
     async getAll() {
          try {
               let response = await $http.get(RESOURCE_NAME);
               let data = response.data;
               return data;
          } catch (error) {
               console.log(error);
          }
     }
}