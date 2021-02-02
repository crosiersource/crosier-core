import axios from "axios";

export async function postEntityData(apiResource, data) {
  const params = {
    headers: {
      "Content-Type": "application/ld+json",
    },
  };
  return axios.post(`${apiResource}`, data, params);
}
