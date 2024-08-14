import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;

public class logoutservlet extends HttpServlet {
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        HttpSession session = request.getSession(false);
        if (session != null) {
            session.invalidate(); // Invalidate the session
        }
        response.sendRedirect("login.html"); // Redirect to login page
    }
}