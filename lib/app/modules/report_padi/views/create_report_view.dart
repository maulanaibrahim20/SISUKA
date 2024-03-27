import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:project_sintren/app/modules/report_padi/views/create_padi_view.dart';
import 'package:project_sintren/app/modules/report_padi/views/report_landing_view.dart';

import '../../../constant/constant.dart';
import '../components/input_dropdown_button.dart';
import '../controllers/report_padi_controller.dart';

class CreateReportView extends GetView<ReportPadiController> {
  CreateReportView({super.key});

  final ReportPadiController reportC =
      Get.put(ReportPadiController(), permanent: false);

  @override
  Widget build(BuildContext context) {
    final Constant cons = Constant();
    final formKey = GlobalKey<FormState>();
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
          key: formKey,
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
                      const Divider(
                        height: 12,
                      ),
                      const SizedBox(height: 10),
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
                      const SizedBox(
                        height: 10,
                      ),
                      Obx(() {
                        return controller.selectedLahan.value == "Lahan Sawah"
                            ? InputDropdownButton(
                                colors: cons,
                                icon: Icons.villa,
                                label: "Rehab Irigasi Tersier",
                                hint: "Rehab Irigasi Tersier",
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
                                validator: (value) {
                                  if (controller.selectedLahan.value ==
                                      "Lahan Sawah") {
                                    if (value == null) {
                                      return "Pilih rehab irigasi tersier";
                                    }
                                  }
                                },
                              )
                            : const SizedBox.shrink();
                      }),
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
                                    const Divider(
                                      height: 12,
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
                                        if (controller.selectedIrigasi.value ==
                                            "Ada") {
                                          return value == null || value.isEmpty
                                              ? "Tanam tidak boleh kosong"
                                              : null;
                                        }
                                        return null;
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
                                        if (controller.selectedIrigasi.value ==
                                            "Ada") {
                                          return value == null || value.isEmpty
                                              ? "Panen tidak boleh kosong"
                                              : null;
                                        }
                                        return null;
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
                onPressed: () {
                  if (formKey.currentState!.validate()) {
                    controller.selectedLahan.value == "Lahan Sawah"
                        ? Get.to(() => const ReportLandingView())
                        : Get.to(() => const CreatePadiView());
                  }
                },
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
