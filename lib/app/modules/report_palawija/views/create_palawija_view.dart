import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:project_sintren/app/modules/report_palawija/models/jenis_palawija.dart';

import '../../../constant/constant.dart';
import '../components/input_dropdown_button.dart';
import '../components/input_text_field.dart';
import '../controllers/report_palawija_controller.dart';
import '../models/report_detail_palawija.dart';

class CreatePalawijaView extends GetView<ReportPalawijaController> {
  const CreatePalawijaView({super.key});

  @override
  Widget build(BuildContext context) {
    Constant cons = Constant();
    return Obx(() {
      return Scaffold(
        appBar: AppBar(
          title: Text(
            "Tambah Data Palawija",
            style: cons.style2,
          ),
          automaticallyImplyLeading: false,
          leading: IconButton(
            onPressed: () => Get.back(),
            icon: Icon(
              Icons.arrow_back,
              color: cons.secondaryColor,
            ),
          ),
          backgroundColor: cons.primaryColor,
          actions: [
            IconButton(
              onPressed: () {},
              icon: Icon(
                Icons.send_rounded,
                color: cons.secondaryColor,
              ),
            ),
          ],
        ),
        backgroundColor: Colors.grey[300],
        resizeToAvoidBottomInset: false,
        body: Padding(
          padding: const EdgeInsets.all(10),
          child: Column(
            children: [
              SizedBox(
                height: Get.height * 0.3,
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
                              "Total Panen Muda: ",
                              style: TextStyle(
                                color: Colors.black,
                                fontSize: 18,
                              ),
                            ),
                            Text(
                              controller.totalPanenMuda.value.toString(),
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
                              "Total Panen Hijauan Pakan Ternak: ",
                              style: TextStyle(
                                color: Colors.black,
                                fontSize: 18,
                              ),
                            ),
                            Text(
                              controller.totalPanenTernak.value.toString(),
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
              Card(
                elevation: 5,
                margin: EdgeInsets.zero,
                surfaceTintColor: cons.secondaryColor,
                child: Padding(
                  padding: const EdgeInsets.all(8.0),
                  child: Column(
                    children: [
                      InputDropdownButton(
                        colors: cons,
                        icon: Icons.villa,
                        label: "Pilih Desa",
                        hint: "Pilih Desa",
                        selectedItem: controller.selectedDesa,
                        items: controller.desa.map(
                          (value) {
                            return DropdownMenuItem<String>(
                              value: value,
                              child: Text(value),
                            );
                          },
                        ).toList(),
                        onChange: (newValue) {
                          controller.selectedDesa.value = newValue;
                        },
                        validator: (value) =>
                            value == null ? "Pilih desa terlebih dahulu" : null,
                      ),
                      const SizedBox(
                        height: 10,
                      ),
                      InputDropdownButton(
                        colors: cons,
                        icon: Icons.villa,
                        label: "Pilih Jenis Lahan",
                        hint: "Pilih Jenis Lahan",
                        selectedItem: controller.selectedLahan,
                        items: controller.lahan.map(
                          (value) {
                            return DropdownMenuItem<String>(
                              value: value,
                              child: Text(value),
                            );
                          },
                        ).toList(),
                        onChange: (newValue) {
                          controller.selectedLahan.value = newValue;
                        },
                        validator: (value) => value == null
                            ? "Pilih jenis lahan terlebih dahulu"
                            : null,
                      ),
                    ],
                  ),
                ),
              ),
              const SizedBox(
                height: 10,
              ),
              ElevatedButton.icon(
                style: ElevatedButton.styleFrom(
                  fixedSize: Size(Get.width, 50),
                  elevation: 5,
                  shape: RoundedRectangleBorder(
                    borderRadius: BorderRadius.circular(15),
                  ),
                  backgroundColor: controller.selectedLahan.value != "" &&
                          controller.selectedDesa.value != ""
                      ? cons.primaryColor
                      : Colors.grey,
                ),
                onPressed: () {
                  if (controller.selectedLahan.value != "" &&
                      controller.selectedDesa.value != "") {
                    _showPopup(context, controller, cons);
                  }
                },
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
                    itemCount: controller.detailPalawija.length,
                    itemBuilder: (context, index) {
                      ReportDetailPalawija data =
                          controller.detailPalawija[index];
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
                                    'Jenis Palawija: ${data.jenisPalawija}',
                                    style: const TextStyle(
                                        fontSize: 16,
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
                                    'Status: ${data.bantuan ? "Bantuan Pemerintah" : "Bantuan Non-Pemerintah"}',
                                  ),
                                  Text(
                                    'Tanaman Akhir Bulan Lalu: ${data.tanamanAkhirBulanLalu}',
                                    style: const TextStyle(fontSize: 14),
                                  ),
                                  Row(
                                    children: [
                                      Text(
                                        'Panen: ${data.panen}',
                                        style: const TextStyle(fontSize: 14),
                                      ),
                                      const SizedBox(
                                        width: 20,
                                      ),
                                      Text(
                                        'Panen Muda: ${data.panenMuda}',
                                        style: const TextStyle(fontSize: 14),
                                      ),
                                      const SizedBox(
                                        width: 20,
                                      ),
                                      Text(
                                        'Panen Ternak: ${data.panenTernak}',
                                        style: const TextStyle(fontSize: 14),
                                      ),
                                    ],
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
                                        'Puso/Rusak: ${data.puso}',
                                        style: const TextStyle(fontSize: 14),
                                      ),
                                    ],
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
        ),
      );
    });
  }
}

void _showPopup(
    BuildContext context, ReportPalawijaController controller, Constant cons) {
  showDialog(
    context: context,
    builder: (BuildContext context) {
      final formKey = GlobalKey<FormState>();
      return Obx(() {
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
              height: 640,
              child: SingleChildScrollView(
                child: Column(
                  children: [
                    DropdownButtonFormField<JenisPalawija>(
                      value: controller.selectedJenisPalawija.value!.nama == ""
                          ? null
                          : controller.selectedJenisPalawija.value,
                      items: controller.jenisPalawija.map(
                        (value) {
                          return DropdownMenuItem<JenisPalawija>(
                            value: value,
                            child: Text(value.nama),
                          );
                        },
                      ).toList(),
                      onChanged: (newValue) {
                        controller.onChangeJenisPalawija(newValue!);
                      },
                      validator: (value) => value == null
                          ? "Pilih jenis palawija terlebih dahulu"
                          : null,
                      decoration: InputDecoration(
                        prefixIcon: Icon(
                          Icons.villa,
                          color: cons.primaryColor,
                        ),
                        labelText: "Pilih Jenis Palawija",
                        hintText: "Pilih Jenis Palawija",
                        border: OutlineInputBorder(
                          borderRadius: BorderRadius.circular(10),
                        ),
                      ),
                    ),
                    const SizedBox(
                      height: 10,
                    ),
                    if (controller.isBantuan.value) ...[
                      InputDropdownButton(
                        colors: cons,
                        icon: Icons.villa,
                        label: "Bantuan Pemerintah",
                        hint: "Bantuan Pemerintah",
                        selectedItem: controller.selectedBantuan,
                        items: controller.bantuan.map(
                          (value) {
                            return DropdownMenuItem<String>(
                              value: value,
                              child: Text(value),
                            );
                          },
                        ).toList(),
                        onChange: (newValue) {
                          controller.selectedBantuan.value = newValue;
                        },
                        validator: (value) => value == null
                            ? "Pilih bantuan terlebih dahulu"
                            : null,
                      ),
                      const SizedBox(
                        height: 10,
                      ),
                    ],
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
                    if (controller.isPanenMuda.value) ...[
                      InputTextField(
                        hint: 'Panen Muda',
                        label: 'Panen Muda',
                        icon: Icons.numbers,
                        con: controller.panenMudaC,
                        isReadOnly: false,
                        onChanged: (value) {
                          controller.countTotalBulanIni();
                        },
                      ),
                      const SizedBox(
                        height: 10,
                      ),
                    ],
                    if (controller.isPanenTernak.value) ...[
                      InputTextField(
                        hint: 'Panen Ternak',
                        label: 'Panen Ternak',
                        icon: Icons.numbers,
                        con: controller.panenTernakC,
                        isReadOnly: false,
                        onChanged: (value) {
                          controller.countTotalBulanIni();
                        },
                      ),
                      const SizedBox(
                        height: 10,
                      ),
                    ],
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
                    if (controller.isProduksi.value) ...[
                      InputTextField(
                        hint: 'Total Produksi',
                        label: 'Total Produksi',
                        icon: Icons.numbers,
                        con: controller.produksiC,
                        isReadOnly: false,
                        onChanged: (value) {
                          controller.countTotalBulanIni();
                        },
                      ),
                      const SizedBox(
                        height: 10,
                      ),
                    ],
                    ElevatedButton(
                      onPressed: () {
                        if (formKey.currentState!.validate()) {
                          controller.addDetailPalawija();
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
      });
    },
  );
}
