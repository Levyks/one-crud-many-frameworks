$('#authorsSelect').select2({
  width: '100%',
  ajax: {
    url: '/authors/search',
    data: getSelect2Data,
    processResults: (data) => {
      return {
        results: data.data.map((author) => ({
          id: author.id,
          text: author.first_name + ' ' + author.last_name
        })),
        pagination: {
          more: !!data.next_page_url
        }
      }
    }
  }
});
$('#categoriesSelect').select2({
  width: '100%',
  ajax: {
    url: '/categories/search',
    data: getSelect2Data,
    processResults: (data) => {
      return {
        results: data.data.map((author) => ({
          id: author.id,
          text: author.name
        })),
        pagination: {
          more: !!data.next_page_url
        }
      }
    }
  }
});

function getSelect2Data(params) {
  return {
    q: params.term,
    page: params.page || 1
  }
}

