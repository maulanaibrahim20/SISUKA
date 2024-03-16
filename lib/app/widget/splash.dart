import 'package:flutter/material.dart';
import 'package:project_sintren/app/constant/constant.dart';

class SplashScreen extends StatelessWidget {
  const SplashScreen({super.key});

  @override
  Widget build(BuildContext context) {
    Constant cons = Constant();
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      home: Scaffold(
        backgroundColor: cons.primaryColor,
        body: Center(
          child: SizedBox(
            height: MediaQuery.of(context).size.height * 0.5,
            width: MediaQuery.of(context).size.width * 0.5,
            child: Center(
              child: Text(
                "SINTREN",
                style: cons.style2
                    .copyWith(fontSize: 32, fontStyle: FontStyle.italic),
              ),
            ),
          ),
        ),
      ),
    );
  }
}
