class ReportPadi {
  int id;
  String provinsi;
  String kota;
  String kecamatan;
  String desa;
  String date;
  String penyuluh;
  String jenisLahan;
  int tersierPanen;
  int tersierTanam;
  String status;

  ReportPadi({
    required this.id,
    this.provinsi = "Jawa Barat",
    this.kota = "Cirebon",
    this.kecamatan = "Harjamukti",
    required this.desa,
    required this.date,
    required this.penyuluh,
    required this.jenisLahan,
    this.tersierPanen = 0,
    this.tersierTanam = 0,
    required this.status,
  });
}
