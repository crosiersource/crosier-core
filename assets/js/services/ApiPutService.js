import axios from "axios";

export async function putEntityData(apiResource, data) {
  const params = {
    headers: {
      "Content-Type": "application/ld+json",
    },
  };
  return axios.put(`${apiResource}`, data, params);
}
