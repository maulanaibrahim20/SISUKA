import 'package:flutter/material.dart';
import 'package:get/get.dart';

import '../../../constant/constant.dart';
import '../controllers/report_padi_controller.dart';
import 'create_padi_view.dart';

class CreateReportView extends GetView<ReportPadiController> {
  CreateReportView({super.key});

  final ReportPadiController reportC =
      Get.put(ReportPadiController(), permanent: false);

  @override
  Widget build(BuildContext context) {
    final Constant cons = Constant();
    return Scaffold(
      resizeToAvoidBottomInset: false,
      appBar: AppBar(
        automaticallyImplyLeading: false,
        title: Text("Buat Laporan Padi", style: cons.style2),
        leading: IconButton(
          icon: Icon(
            Icons.arrow_back,
            color: cons.secondaryColor,
          ),
          onPressed: () => Get.back(),
        ),
        backgroundColor: cons.primaryColor,
      ),
      body: Padding(
        padding: const EdgeInsets.all(10),
        child: Form(
          child: Column(
            children: [
              Card(
                elevation: 5,
                surfaceTintColor: cons.secondaryColor,
                child: Padding(
                  padding: const EdgeInsets.all(10),
                  child: Column(
                    children: [
                      const Text(
                        "Input Data Laporan Padi",
                        style: TextStyle(fontWeight: FontWeight.bold),
                      ),
                      const SizedBox(height: 10),
                      InputDropdownButton(
                        controller: controller,
                        colors: cons,
                        icon: Icons.villa,
                        label: "Pilih Desa",
                        selectedItem: controller.selectedDesa,
                        items: controller.desa.map(
                          (value) {
                            return DropdownMenuItem<String>(
                              value: value.id,
                              child: Text(value.nama),
                            );
                          },
                        ).toList(),
                        onChange: (newValue) {
                          controller.selectedDesa.value = newValue;
                        },
                      ),
                      const SizedBox(
                        height: 10,
                      ),
                      InputDropdownButton(
                        controller: controller,
                        colors: cons,
                        icon: Icons.villa,
                        label: "Pilih Jenis Lahan",
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
                      ),
                      const SizedBox(
                        height: 10,
                      ),
                      InputDropdownButton(
                        controller: controller,
                        colors: cons,
                        icon: Icons.villa,
                        label: "Rehab Irigasi Tersier",
                        selectedItem: controller.selectedIrigasi,
                        items: controller.irigasi.map(
                          (value) {
                            return DropdownMenuItem<String>(
                              value: value,
                              child: Text(value),
                            );
                          },
                        ).toList(),
                        onChange: (newValue) {
                          controller.selectedIrigasi.value = newValue;
                        },
                      ),
                    ],
                  ),
                ),
              ),
              const SizedBox(
                height: 20,
              ),
              Obx(
                () {
                  return controller.selectedIrigasi.value == "Ada"
                      ? Column(
                          children: [
                            Card(
                              elevation: 5,
                              surfaceTintColor: cons.secondaryColor,
                              child: Padding(
                                padding: const EdgeInsets.all(10),
                                child: Column(
                                  children: [
                                    const Text(
                                      "Input Data Rehab Irigasi Tersier",
                                      style: TextStyle(
                                          fontWeight: FontWeight.bold),
                                    ),
                                    const SizedBox(height: 10),
                                    TextFormField(
                                      keyboardType: TextInputType.number,
                                      decoration: InputDecoration(
                                        prefixIcon: const Icon(Icons.person),
                                        hintText: "Tanam",
                                        labelText: "Tanam",
                                        border: OutlineInputBorder(
                                          borderRadius:
                                              BorderRadius.circular(10),
                                        ),
                                      ),
                                      validator: (value) {
                                        return value == null || value.isEmpty
                                            ? "username/email tidak boleh kosong"
                                            : null;
                                      },
                                    ),
                                    const SizedBox(height: 10),
                                    TextFormField(
                                      keyboardType: TextInputType.number,
                                      decoration: InputDecoration(
                                        prefixIcon: const Icon(Icons.person),
                                        hintText: "Panen",
                                        labelText: "Panen",
                                        border: OutlineInputBorder(
                                          borderRadius:
                                              BorderRadius.circular(10),
                                        ),
                                      ),
                                      validator: (value) {
                                        return value == null || value.isEmpty
                                            ? "username/email tidak boleh kosong"
                                            : null;
                                      },
                                    ),
                                  ],
                                ),
                              ),
                            ),
                            const SizedBox(
                              height: 20,
                            ),
                          ],
                        )
                      : const SizedBox();
                },
              ),
              ElevatedButton(
                onPressed: () => Get.to(() => const CreatePadiView()),
                style: ElevatedButton.styleFrom(
                  elevation: 5,
                  backgroundColor: cons.primaryColor,
                  shape: RoundedRectangleBorder(
                    borderRadius: BorderRadius.circular(15),
                  ),
                  fixedSize: Size(Get.width, 60),
                ),
                child: Text(
                  "Selanjutnya",
                  style: cons.style2.copyWith(fontSize: 20),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}

class InputDropdownButton extends StatelessWidget {
  const InputDropdownButton({
    super.key,
    required this.controller,
    required this.colors,
    required this.icon,
    required this.label,
    required this.selectedItem,
    required this.items,
    this.onChange,
  });

  final ReportPadiController controller;
  final Constant colors;
  final IconData icon;
  final String label;
  final RxString selectedItem;
  final List<DropdownMenuItem<String>> items;
  final dynamic onChange;

  @override
  Widget build(BuildContext context) {
    return Obx(() {
      return DropdownButtonFormField<String>(
        value: selectedItem.value == "" ? null : selectedItem.value,
        items: items,
        onChanged: onChange,
        decoration: InputDecoration(
          prefixIcon: Icon(
            icon,
            color: colors.primaryColor,
          ),
          labelText: label,
          border: OutlineInputBorder(
            borderRadius: BorderRadius.circular(10),
          ),
        ),
      );
    });
  }
}
