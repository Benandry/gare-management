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

export default getData;
