import 'package:flutter/material.dart';
import 'package:get/get.dart';

import '../../../constant/constant.dart';
import '../components/input_dropdown_button.dart';
import '../components/input_text_field.dart';
import '../controllers/pengairan_controller.dart';
import '../models/report_detail_pengairan.dart';

class CreatePengairanView extends GetView<PengairanController> {
  const CreatePengairanView({super.key});

  @override
  Widget build(BuildContext context) {
    final PengairanController controller =
        Get.put(PengairanController(), permanent: false);

    Constant cons = Constant();
    return Scaffold(
      backgroundColor: Colors.grey[300],
      resizeToAvoidBottomInset: false,
      body: Obx(() {
        return Padding(
          padding: const EdgeInsets.all(10),
          child: Column(
            children: [
              SizedBox(
                height: Get.height * 0.25,
                width: Get.width,
                child: Card(
                  elevation: 5,
                  margin: EdgeInsets.zero,
                  surfaceTintColor: cons.secondaryColor,
                  child: Padding(
                    padding: const EdgeInsets.symmetric(
                      horizontal: 20,
                      vertical: 10,
                    ),
                    child: Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                      children: [
                        const Center(
                          child: Text(
                            "Data Input",
                            style: TextStyle(
                              fontSize: 16,
                              fontWeight: FontWeight.bold,
                            ),
                          ),
                        ),
                        const Divider(),
                        Row(
                          mainAxisAlignment: MainAxisAlignment.spaceBetween,
                          children: [
                            const Text(
                              "Total Tanaman Akhir Bulan Lalu: ",
                              style: TextStyle(
                                color: Colors.black,
                                fontSize: 18,
                              ),
                            ),
                            Text(
                              controller.totalTanamanAkhirBulanLalu.value
                                  .toString(),
                              style: const TextStyle(
                                fontWeight: FontWeight.bold,
                                fontSize: 18,
                              ),
                            ),
                          ],
                        ),
                        Row(
                          mainAxisAlignment: MainAxisAlignment.spaceBetween,
                          children: [
                            const Text(
                              "Total Panen: ",
                              style: TextStyle(
                                color: Colors.black,
                                fontSize: 18,
                              ),
                            ),
                            Text(
                              controller.totalPanen.value.toString(),
                              style: const TextStyle(
                                fontWeight: FontWeight.bold,
                                fontSize: 18,
                              ),
                            ),
                          ],
                        ),
                        Row(
                          mainAxisAlignment: MainAxisAlignment.spaceBetween,
                          children: [
                            const Text(
                              "Total Tanam: ",
                              style: TextStyle(
                                color: Colors.black,
                                fontSize: 18,
                              ),
                            ),
                            Text(
                              controller.totalTanam.value.toString(),
                              style: const TextStyle(
                                fontWeight: FontWeight.bold,
                                fontSize: 18,
                              ),
                            ),
                          ],
                        ),
                        Row(
                          mainAxisAlignment: MainAxisAlignment.spaceBetween,
                          children: [
                            const Text(
                              "Total Puso/Rusak: ",
                              style: TextStyle(
                                color: Colors.black,
                                fontSize: 18,
                              ),
                            ),
                            Text(
                              controller.totalPuso.value.toString(),
                              style: const TextStyle(
                                fontWeight: FontWeight.bold,
                                fontSize: 18,
                              ),
                            ),
                          ],
                        ),
                        const Divider(),
                        Row(
                          mainAxisAlignment: MainAxisAlignment.spaceBetween,
                          children: [
                            const Text(
                              "Total Tanaman Akhir Bulan Ini: ",
                              style: TextStyle(
                                color: Colors.black,
                                fontSize: 18,
                              ),
                            ),
                            Text(
                              controller.totalTanamanAkhirBulanIni.value
                                  .toString(),
                              style: const TextStyle(
                                fontWeight: FontWeight.bold,
                                fontSize: 18,
                              ),
                            ),
                          ],
                        ),
                      ],
                    ),
                  ),
                ),
              ),
              const SizedBox(height: 10),
              ElevatedButton.icon(
                style: ElevatedButton.styleFrom(
                  fixedSize: Size(Get.width, 50),
                  elevation: 5,
                  shape: RoundedRectangleBorder(
                    borderRadius: BorderRadius.circular(15),
                  ),
                  backgroundColor: cons.primaryColor,
                ),
                onPressed: () => _showPopup(context, controller, cons),
                icon: Icon(
                  Icons.add,
                  color: cons.secondaryColor,
                ),
                label: Text(
                  "Tambah Data",
                  style: cons.style2,
                ),
              ),
              const SizedBox(height: 10),
              Expanded(
                child: SizedBox(
                  height: Get.height * 0.5,
                  width: Get.width,
                  child: ListView.builder(
                    itemCount: controller.detailPengairan.length,
                    itemBuilder: (context, index) {
                      ReportDetailPengairan data =
                          controller.detailPengairan[index];
                      return Card(
                        surfaceTintColor: cons.secondaryColor,
                        elevation: 3,
                        child: Column(
                          crossAxisAlignment: CrossAxisAlignment.start,
                          mainAxisSize: MainAxisSize.min,
                          children: [
                            const SizedBox(height: 10),
                            Padding(
                              padding:
                                  const EdgeInsets.symmetric(horizontal: 20),
                              child: Row(
                                mainAxisAlignment:
                                    MainAxisAlignment.spaceBetween,
                                children: [
                                  Text(
                                    'Jenis Pengairan: ${data.jenisPengairan}',
                                    style: const TextStyle(
                                        fontSize: 14,
                                        fontWeight: FontWeight.bold),
                                  ),
                                  const Icon(
                                    Icons.remove_circle,
                                    color: Colors.red,
                                  ),
                                ],
                              ),
                            ),
                            const Divider(),
                            Padding(
                              padding:
                                  const EdgeInsets.symmetric(horizontal: 20),
                              child: Column(
                                crossAxisAlignment: CrossAxisAlignment.start,
                                children: [
                                  Text(
                                    'Tanaman Akhir Bulan Lalu: ${data.tanamanAkhirBulanLalu}',
                                    style: const TextStyle(fontSize: 14),
                                  ),
                                  Row(
                                    children: [
                                      Text(
                                        'Tanam: ${data.tanam}',
                                        style: const TextStyle(fontSize: 14),
                                      ),
                                      const SizedBox(
                                        width: 20,
                                      ),
                                      Text(
                                        'Panen: ${data.panen}',
                                        style: const TextStyle(fontSize: 14),
                                      ),
                                    ],
                                  ),
                                  Text(
                                    'Puso/Rusak: ${data.puso}',
                                    style: const TextStyle(fontSize: 14),
                                  ),
                                  Text(
                                    'Tanaman Akhir Bulan Ini: ${data.tanamanAkhirBulanIni}',
                                    style: const TextStyle(fontSize: 14),
                                  ),
                                  const SizedBox(height: 10),
                                ],
                              ),
                            ),
                          ],
                        ),
                      );
                    },
                  ),
                ),
              ),
            ],
          ),
        );
      }),
    );
  }
}

void _showPopup(
    BuildContext context, PengairanController controller, Constant cons) {
  showDialog(
    context: context,
    builder: (BuildContext context) {
      final formKey = GlobalKey<FormState>();
      return Form(
        key: formKey,
        child: AlertDialog(
          surfaceTintColor: cons.secondaryColor,
          title: const Column(
            children: [
              Text('Detail Data Padi'),
              Divider(),
            ],
          ),
          content: SizedBox(
            height: 555,
            child: SingleChildScrollView(
              child: Column(
                children: [
                  InputDropdownButton(
                    colors: cons,
                    icon: Icons.villa,
                    label: "Pilih Jenis Pengairan",
                    hint: "Pilih Jenis Pengairan",
                    selectedItem: controller.selectedJenisPengairan,
                    items: controller.jenisPengairan.map(
                      (value) {
                        return DropdownMenuItem<String>(
                          value: value,
                          child: Text(value),
                        );
                      },
                    ).toList(),
                    onChange: (newValue) {
                      controller.selectedJenisPengairan.value = newValue;
                    },
                    validator: (value) => value == null
                        ? "Pilih jenis pengairan terlebih dahulu"
                        : null,
                  ),
                  const SizedBox(
                    height: 10,
                  ),
                  InputTextField(
                    hint: 'Tanaman akhir bulan lalu',
                    label: 'Tanaman akhir bulan lalu',
                    icon: Icons.numbers,
                    con: controller.tanamanAkhirBulanLaluC,
                    isReadOnly: false,
                    onChanged: (value) {
                      controller.countTotalBulanIni();
                    },
                    validator: (value) => value == null || value.isEmpty
                        ? "Panen tidak boleh kosong"
                        : null,
                  ),
                  const SizedBox(
                    height: 10,
                  ),
                  InputTextField(
                    hint: 'Panen',
                    label: 'Panen',
                    icon: Icons.numbers,
                    con: controller.panenC,
                    isReadOnly: false,
                    onChanged: (value) {
                      controller.countTotalBulanIni();
                    },
                  ),
                  const SizedBox(
                    height: 10,
                  ),
                  InputTextField(
                    hint: 'Tanam',
                    label: 'Tanam',
                    icon: Icons.numbers,
                    con: controller.tanamC,
                    isReadOnly: false,
                    onChanged: (value) {
                      controller.countTotalBulanIni();
                    },
                  ),
                  const SizedBox(
                    height: 10,
                  ),
                  InputTextField(
                    hint: 'Puso/Rusak',
                    label: 'Puso/Rusak',
                    icon: Icons.numbers,
                    con: controller.pusoC,
                    isReadOnly: false,
                    onChanged: (value) {
                      controller.countTotalBulanIni();
                    },
                  ),
                  const SizedBox(
                    height: 10,
                  ),
                  InputTextField(
                    hint: 'Tanaman akhir bulan ini',
                    label: 'Tanaman akhir bulan ini',
                    icon: Icons.numbers,
                    con: controller.tanamanAkhirBulanIniC,
                    isReadOnly: true,
                  ),
                  const SizedBox(
                    height: 10,
                  ),
                  ElevatedButton(
                    onPressed: () {
                      if (formKey.currentState!.validate()) {
                        controller.addDetailPengairan();
                        controller.countTotal();
                        Navigator.of(context).pop();
                      }
                    },
                    style: ElevatedButton.styleFrom(
                        backgroundColor: cons.primaryColor,
                        shape: RoundedRectangleBorder(
                          borderRadius: BorderRadius.circular(15),
                        ),
                        fixedSize: Size(Get.width, 50)),
                    child: Text(
                      "Tambah",
                      style: cons.style2,
                    ),
                  ),
                  const SizedBox(height: 10),
                  ElevatedButton(
                    onPressed: () {
                      Navigator.of(context).pop();
                    },
                    style: ElevatedButton.styleFrom(
                        shape: RoundedRectangleBorder(
                          borderRadius: BorderRadius.circular(15),
                        ),
                        fixedSize: Size(Get.width, 50)),
                    child: Text(
                      'Tutup',
                      style: cons.style1,
                    ),
                  ),
                  const SizedBox(height: 10),
                ],
              ),
            ),
          ),
        ),
      );
    },
  );
}
