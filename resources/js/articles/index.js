function confirmDelete(event) {
    if (!confirm("Apakah Artikel ini ingin di hapus?")) {
      event.preventDefault();
      return false;
    }
    return true;
  }
  