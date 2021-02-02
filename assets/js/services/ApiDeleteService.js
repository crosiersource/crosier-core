import axios from "axios";

export async function deleteEntityData({ apiResource }) {
  const params = {
    headers: {
      "Content-Type": "application/ld+json",
    },
  };
  return axios.delete(`${apiResource}`, params);
}
