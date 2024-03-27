class ReportPalawija {
  final int id;
  final String provinsi;
  final String kota;
  final String kecamatan;
  final String desa;
  final String date;
  final String penyuluh;
  final String jenisLahan;
  final String status;

  ReportPalawija({
    required this.id,
    this.provinsi = "Jawa Barat",
    this.kota = "Cirebon",
    this.kecamatan = "Harjamukti",
    required this.desa,
    required this.date,
    required this.penyuluh,
    required this.jenisLahan,
    required this.status,
  });
}
