import axios from "axios";

export async function fetchTableData({
  apiResource,
  page = 1,
  rows = 10,
  order = [],
  filters = {},
}) {
  const params = {
    headers: {
      "Content-Type": "application/json;charset=UTF-8",
    },
  };
  const queryPage = `?page=${page}`;
  const queryRows = `&rows=${rows}`;
  let queryOrder = [];
  let queryFilter = "";

  order?.forEach((value, key) => {
    queryOrder += `&order[${key}]=${value}`;
  }, order);

  // eslint-disable-next-line no-restricted-syntax
  for (const key in filters) {
    if (filters[key] !== null && filters[key] !== "")
      queryFilter += `&${key}=${filters[key]}`;
  }

  console.log(
    `${apiResource}${queryPage}${queryRows}${queryFilter}${queryOrder}`
  );
  return axios.get(
    `${apiResource}${queryPage}${queryRows}${queryFilter}${queryOrder}`,
    params
  );
}
