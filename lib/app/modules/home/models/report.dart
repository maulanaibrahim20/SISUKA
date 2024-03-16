class ReportPadi {
  final int id;
  final String provinsi;
  final String kota;
  final String kecamatan;
  final String desa;
  final String date;
  final String penyuluh;
  final String jenisLahan;
  final int tersierPanen;
  final int tersierTanam;
  final String status;

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
