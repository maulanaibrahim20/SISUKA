import 'package:flutter/material.dart';

import 'package:get/get.dart';

import '../controllers/coba_controller.dart';

class CobaView extends GetView<CobaController> {
  const CobaView({super.key});
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('GetX Demo'),
      ),
      body: Padding(
        padding: const EdgeInsets.all(20.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.stretch,
          children: [
            TextField(
              controller: controller.nameController,
              decoration: const InputDecoration(labelText: 'Name'),
            ),
            const SizedBox(height: 10),
            TextField(
              controller: controller.ageController,
              decoration: const InputDecoration(labelText: 'Age'),
              keyboardType: TextInputType.number,
            ),
            const SizedBox(height: 20),
            ElevatedButton(
              onPressed: () {
                controller.addData();
              },
              child: const Text('Add Data'),
            ),
            const SizedBox(height: 20),
            Expanded(
              child: Obx(() => ListView.builder(
                    itemCount: controller.dataList.length,
                    itemBuilder: (context, index) {
                      return ListTile(
                        title: Text(controller.dataList[index].name),
                        subtitle:
                            Text(controller.dataList[index].age.toString()),
                      );
                    },
                  )),
            ),
          ],
        ),
      ),
    );
  }
}
