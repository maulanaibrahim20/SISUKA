import 'package:flutter/material.dart';
import 'package:get/get.dart';

import '../../../constant/constant.dart';
import '../controllers/report_padi_controller.dart';

class CreatePadiView extends GetView<ReportPadiController> {
  const CreatePadiView({super.key});

  @override
  Widget build(BuildContext context) {
    Constant colors = Constant();
    return Scaffold(
      appBar: AppBar(
        automaticallyImplyLeading: false,
        backgroundColor: colors.primaryColor,
        leading: IconButton(
          icon: Icon(
            Icons.arrow_back,
            color: colors.secondaryColor,
          ),
          onPressed: () => Get.back(),
        ),
        title: Text(
          "Tamabah Data Padi",
          style: TextStyle(
            fontWeight: FontWeight.bold,
            color: colors.secondaryColor,
          ),
        ),
      ),
      body: const Text("Padi"),
    );
  }
}
