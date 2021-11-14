$('form.require-confirm').on('submit', (e) => {
  const confirm_message = $(e.target).attr('confirm');
  if(!confirm(confirm_message)) e.preventDefault();
});