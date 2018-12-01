#include <jni.h>
#include <string>

extern "C" JNIEXPORT jstring JNICALL
Java_fkfhws_webbankingassistantapp_Hauptemenue_stringFromJNI(
        JNIEnv* env,
        jobject /* this */) {
    std::string hello = "Hello from C++";
    return env->NewStringUTF(hello.c_str());
}
