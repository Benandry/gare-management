async function getData(url) {
  try {
    let loading = false;
    const apiTravelerResponses = await fetch(
      `https://127.0.0.1:8001/api/${url}`,
      {
        method: "GET",
      }
    );
    const result = await apiTravelerResponses.json();
    loading = true;
    return { result, loading };
  } catch (error) {
    console.error(error);
  }
}

async function updateData(url, data) {
  try {
    const apiTravelerResponses = await fetch(
      `https://127.0.0.1:8001/api/${url}`,
      {
        method: "PUT", // *GET, POST, PUT, DELETE, etc.
        mode: "cors",
        cache: "no-cache",
        headers: {
          "Content-Type": "application/json",
        },
        redirect: "follow",
        referrerPolicy: "no-referrer",
        body: JSON.stringify(data),
      }
    );
    const result = await apiTravelerResponses.json();
    return { result };
  } catch (error) {
    console.error(error);
  }
}

async function postData(url, data) {
  try {
    const apiTravelerResponses = await fetch(
      `https://127.0.0.1:8001/api/${url}`,
      {
        method: "POST", // *GET, POST, PUT, DELETE, etc.
        mode: "cors",
        cache: "no-cache",
        headers: {
          "Content-Type": "application/json",
        },
        redirect: "follow",
        referrerPolicy: "no-referrer",
        body: JSON.stringify(data),
      }
    );
    const result = await apiTravelerResponses.json();
    return { result };
  } catch (error) {
    console.error(error);
  }
}

async function deleteData(url, data) {
  try {
    const apiTravelerResponses = await fetch(
      `https://127.0.0.1:8001/api/${url}`,
      {
        method: "DELETE", // *GET, POST, PUT, DELETE, etc.
        mode: "cors",
        cache: "no-cache",
        headers: {
          "Content-Type": "application/json",
        },
        redirect: "follow",
        referrerPolicy: "no-referrer",
      }
    );
    const result = await apiTravelerResponses.json();
    console.log(result);
    return { result };
  } catch (error) {
    console.error(error);
  }
}

export { getData, postData, updateData, deleteData };
