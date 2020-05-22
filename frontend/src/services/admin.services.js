import $http from "./config";
const RESOURCE_NAME = "/admin";
let JWTToken = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2FwaVwvbG9naW4iLCJpYXQiOjE1ODk1MDM5NzQsImV4cCI6MTU4OTUwNzU3NCwibmJmIjoxNTg5NTAzOTc0LCJqdGkiOiJyYlJEdTNSb0hTSU9BamlqIiwic3ViIjoicm9vdDEyMyIsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.K2Ouq1Ofrw5iNU8fXjIni2AZR4f7JbXOMYug8JKHSk0";
const headers = {
     'Authorization':`Bearer ${JWTToken}`,
     'Content-Type': 'application/json'
};
export default {
     async getClassify() {
          try {
               let response = await $http.get(RESOURCE_NAME+'/getClassify',{
                   headers:headers
               });
               let data = response.data;
               return data;
          } catch (error) {
               console.log(error.response);
          }
     },
     async getDep(){
          try{
               let response = await $http.get(RESOURCE_NAME+"/getDepartment",{
                    headers:headers
               });
               let data = response.data;
               return data;
          }catch(error){
               console.log(error.response);
          }
     },
     async post(payload){
          try{
               let response = await $http.post(RESOURCE_NAME+'/post',payload,{
                    headers:headers
               });
               console.log(response);
               return  response.data;
          }catch(error){
               console.log(error.response);
          }
     }
}