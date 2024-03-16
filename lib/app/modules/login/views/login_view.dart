import 'package:flutter/material.dart';

import 'package:get/get.dart';
import 'package:project_sintren/app/constant/constant.dart';

import '../../../routes/app_pages.dart';
import '../controllers/login_controller.dart';

class LoginView extends GetView<LoginController> {
  const LoginView({super.key});

  @override
  Widget build(BuildContext context) {
    Constant cons = Constant();
    final formKey = GlobalKey<FormState>();
    return Scaffold(
      resizeToAvoidBottomInset: false,
      body: Stack(
        children: [
          Container(
            height: Get.height * 0.5,
            color: cons.primaryColor,
          ),
          Center(
            child: Column(
              children: [
                const SizedBox(
                  height: 100,
                ),
                Text(
                  "SINTREN",
                  style: cons.style2.copyWith(fontSize: 32),
                ),
                const SizedBox(
                  height: 50,
                ),
                Card(
                  surfaceTintColor: Colors.white,
                  child: SizedBox(
                    height: Get.height * 0.45,
                    width: Get.width * 0.9,
                    child: Form(
                      key: formKey,
                      child: Column(
                        mainAxisAlignment: MainAxisAlignment.spaceBetween,
                        children: [
                          Padding(
                            padding: const EdgeInsets.symmetric(horizontal: 20),
                            child: Column(
                              children: [
                                const SizedBox(
                                  height: 20,
                                ),
                                Text(
                                  "LOGIN",
                                  style: cons.style2.copyWith(fontSize: 24),
                                ),
                                const SizedBox(
                                  height: 20,
                                ),
                                const Text(
                                  "Silahkan Login Terlebih Dahulu",
                                  style: TextStyle(fontSize: 20),
                                ),
                                const SizedBox(
                                  height: 20,
                                ),
                                TextFormField(
                                  keyboardType: TextInputType.name,
                                  decoration: InputDecoration(
                                    border: OutlineInputBorder(
                                      borderRadius: BorderRadius.circular(10),
                                    ),
                                    prefixIcon: const Icon(Icons.person),
                                    hintText: "Username/Email",
                                    labelText: "Username/Email",
                                  ),
                                  validator: (value) {
                                    return value == null || value.isEmpty
                                        ? "username/email tidak boleh kosong"
                                        : null;
                                  },
                                ),
                                const SizedBox(
                                  height: 20,
                                ),
                                TextFormField(
                                  keyboardType: TextInputType.name,
                                  obscureText: true,
                                  decoration: InputDecoration(
                                    border: OutlineInputBorder(
                                      borderRadius: BorderRadius.circular(10),
                                    ),
                                    prefixIcon: const Icon(Icons.lock),
                                    hintText: "Password",
                                    labelText: "Password",
                                  ),
                                  validator: (value) {
                                    return value == null || value.isEmpty
                                        ? "password tidak boleh kosong"
                                        : null;
                                  },
                                ),
                              ],
                            ),
                          ),
                          ElevatedButton(
                            onPressed: () {
                              if (formKey.currentState!.validate()) {
                                Get.offAllNamed(Routes.HOME);
                              }
                            },
                            style: ElevatedButton.styleFrom(
                              fixedSize: Size(Get.width, 60),
                              backgroundColor: cons.primaryColor,
                              shape: const RoundedRectangleBorder(
                                borderRadius: BorderRadius.only(
                                  bottomLeft: Radius.circular(10),
                                  bottomRight: Radius.circular(10),
                                ),
                              ),
                            ),
                            child: Text(
                              "LOGIN",
                              style: cons.style2.copyWith(fontSize: 18),
                            ),
                          ),
                        ],
                      ),
                    ),
                  ),
                ),
              ],
            ),
          )
        ],
      ),
    );
  }
}

class BackgroundClipper extends CustomClipper<Path> {
  @override
  getClip(Size size) {
    Path path = Path();
    path.lineTo(0, size.height - 60);

    path.quadraticBezierTo(
        size.width / 2, size.height, size.width, size.height - 60);

    path.lineTo(size.width, 0);
    path.close();

    return path;
  }

  @override
  bool shouldReclip(covariant CustomClipper oldClipper) => false;
}
